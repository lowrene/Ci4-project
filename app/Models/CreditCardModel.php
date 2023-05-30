<?php

namespace App\Models;

use CodeIgniter\Model;

class CreditCardModel extends Model
{
    protected $table = 'credit_cards';
    protected $primaryKey = 'id';
    protected $allowedFields = ['card_number', 'expiry_month', 'expiry_year'];
}
