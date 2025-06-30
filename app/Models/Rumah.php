<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_rumah',
        'harga_rumah',
        'lokasi_rumah'
    ];

    // join ke table user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
