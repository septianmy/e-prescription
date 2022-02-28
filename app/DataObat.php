<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{

    protected $fillable = [
        'obatalkes_kode',
        'obatalkes_nama', 
        'stok'
    ];

    public $timestamps = false;

    protected $table = 'obatalkes_m';
}
