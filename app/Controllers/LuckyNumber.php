<?php

namespace App\Controllers;

class LuckyNumber extends BaseController
{
    public function index()
    {
        $data['luckyNumber'] = mt_rand(222, 456);

        return view('lucky/lucky_number', $data);
    }
}
