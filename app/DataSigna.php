<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSigna extends Model
{

    protected $fillable = [
        'signa_kode',
        'signa_nama', 
    ];

    protected $table = 'signa_m';
}
