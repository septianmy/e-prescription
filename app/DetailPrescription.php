<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPrescription extends Model
{
    protected $fillable = [
        'id_prescription',
        'id_obat', 
        'id_racikan',
        'qty',
        'id_signa'
    ];

    protected $table = 'detail_prescription';
}
