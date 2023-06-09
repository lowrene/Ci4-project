<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

use App\Controllers\LuckyNumber;
use App\Controllers\Table;
$routes->get('lucky-number', [LuckyNumber::class, 'index']);

$routes->get('table-alternative-row-bg', [Table::class, 'index']);

$routes->get('credit-card', 'CreditCard::index');
$routes->match(['get', 'post'], 'credit-card/store', 'CreditCard::store');


use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Email;

$routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
$routes->get('news/(:segment)', [News::class, 'view']);
$routes->get('news', [News::class, 'index']);
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('email', [Email::class, 'index']);
$routes->match(['get', 'post'], 'email/create', [Email::class, 'create']);
$routes->get('email/view', [Email::class, 'view']);  // Updated route for viewing all emails


// lab 3
$routes->get('email/edit/(:num)', 'Email::edit/$1');
$routes->post('email/update/(:num)', 'Email::update/$1');
$routes->get('email/delete/(:num)', 'Email::delete/$1');
$routes->post('email/delete/(:num)', 'Email::confirmDelete/$1');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
