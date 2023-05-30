<?php

namespace App\Controllers;

class Table extends BaseController
{
    public function index()
    {
        $data['rows'] = $this->generateRandomData(10);

        return view('lab4/table', $data);
    }

    private function generateRandomData($rowCount)
    {
        $data = [];

        $colors = ['red', 'yellow', 'green'];
        $colorCount = count($colors);

        for ($i = 0; $i <= $rowCount; $i++) {
            $row = [
                'id' => $i,
                'data' => $this->generateRandomString(), // Replace with your desired random data generation method
                'color' => $colors[$i % $colorCount]
            ];
            $data[] = $row;
        }

        return $data;
    }

    private function generateRandomString()
    {
        // Replace this with your desired method for generating random strings
        return 'Random String ' . mt_rand(1, 100);
    }
}
