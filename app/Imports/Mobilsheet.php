<?php

namespace App\Imports;

use App\Models\Mobil;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class Mobilsheet implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 1;
        foreach ($collection as $row) {

            if ($index > 1) {
                // dd($row);

                $namaMobil = !empty($row[0]) ? $row[0] : '';

                if (!$namaMobil) {
                    break;
                }

                $data['user_id'] = auth()->user()->id;
                $data['type_mobil'] = $row[0];
                $data['tahun_pembelian'] = $row[1];
                $data['harga_mobil'] = $row[2];

                Mobil::create($data);
            }

            $index++;
        }
    }
}
