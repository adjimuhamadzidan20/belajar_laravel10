<?php

namespace App\Imports;

use App\Models\Rumah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class Rumahsheet implements ToCollection
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

                $typeRumah = !empty($row[0]) ? $row[0] : '';

                if (!$typeRumah) {
                    break;
                }

                $data['user_id'] = auth()->user()->id;
                $data['type_rumah'] = $row[0];
                $data['harga_rumah'] = $row[1];
                $data['lokasi_rumah'] = $row[2];

                Rumah::create($data);
            }

            $index++;
        }
    }
}
