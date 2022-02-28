<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racikan extends Model
{

    protected $fillable = [
        'nama_racikan',
        'is_store'
    ];

    protected $table = 'racikan';
}
