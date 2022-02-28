<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_name',
        'prescription_date', 
        'is_store'
    ];

    protected $table = 'prescription';

    protected $dates = ['deleted_at'];
}
