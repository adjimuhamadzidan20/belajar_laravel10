<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_mobil',
        'tahun_pembelian',
        'harga_mobil'
    ];
}
