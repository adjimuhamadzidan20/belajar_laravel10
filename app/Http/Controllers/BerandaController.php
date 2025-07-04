<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Mobil;
use App\Models\Ktp;
use App\Models\Asset;

class BerandaController extends Controller
{
    public function dashboard()
    {
        $dataUser = new User();
        $dataRumah = new Rumah();
        $dataMobil = new Mobil();
        $dataKtp = new Ktp();
        $dataAsset = new Asset();

        return view('dashboard', [
            'user' => $dataUser->get(),
            'rumah' => $dataRumah->get(),
            'mobil' => $dataMobil->get(),
            'ktp' => $dataKtp->get(),
            'asset' => $dataAsset->get()
        ]);
    }
}
