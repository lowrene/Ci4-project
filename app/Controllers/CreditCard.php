<?php

namespace App\Controllers;

use App\Models\CreditCardModel;

class CreditCard extends BaseController
{
    public function index()
    {
        return view('lab4/credit_card_form');
    }

    public function store()
{
    $rules = [
        'card_number' => 'required|numeric',
        'month' => 'required',
        'year' => 'required'
    ];

    if ($this->validate($rules)) {
        $cardNumber = $this->request->getPost('card_number');
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');

        $data = [
            'card_number' => $cardNumber,
            'expiry_month' => $month,
            'expiry_year' => $year
        ];

        $model = new CreditCardModel();
        $model->insert($data);

        return redirect()->to('credit-card')->with('success', 'Credit card details saved successfully.');
    } else {
        return redirect()->to('credit-card')->withInput()->with('errors', $this->validator->getErrors());
    }
}

}
