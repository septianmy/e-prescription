<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailRacikan extends Model
{

    protected $fillable = [
        'id_racikan',
        'id_obat',
        'qty'
    ];

    protected $table = 'detail_racikan';
}
