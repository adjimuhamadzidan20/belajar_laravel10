<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EnkripsiController extends Controller
{
    public function enkripsi(Request $request)
    {
        $string = 'Nama saya Adji Muhamad Zidan';
        $enkrip = Crypt::encryptString($string);
        $dekrip = Crypt::decryptString($enkrip);

        echo 'Tulisan Asli : ' . $string . '<br><br>';
        echo 'Hasil enkripsi : ' . $enkrip . '<br><br>';
        echo 'Hasil dekripsi : ' . $dekrip . '<br><br>';

        $params = [
            'nama' => 'Adji Muhamad Zidan',
            'hobby' => 'Olahraga',
            'Minuman' => 'Coffe'
        ];

        $params = Crypt::encrypt($params);
        echo '<a href="' . route('enkripsi_detail', ['params' => $params]) . '">Detail</a>';
    }

    public function enkripsi_detail($params)
    {
        $params = Crypt::decrypt($params);
        dd($params);
    }
}
