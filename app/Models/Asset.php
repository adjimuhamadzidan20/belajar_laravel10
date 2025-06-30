<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // many to many
    public function user()
    {
        $table = 'user_asset';
        return $this->belongsToMany(User::class, $table);
    }
}
