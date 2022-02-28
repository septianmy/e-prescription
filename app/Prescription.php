<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    protected $fillable = [
        'patient_name',
        'prescription_date', 
        'is_store'
    ];

    protected $table = 'prescription';
}
