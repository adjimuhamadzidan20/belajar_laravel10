<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $indexData = 1;
        foreach ($collection as $row) {

            if ($indexData > 1) {
                $nama = !empty($row[0]) ? $row[0] : '';

                if (!$nama) {
                    break;
                }

                $data['name'] = $nama;
                $data['email'] = $row[1];
                $data['password'] = Hash::make($row[2]);

                // dd($data);
                User::create($data);
            }

            $indexData++;
        }
    }
}
