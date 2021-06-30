<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    //
    
    public $table = 'tipo_pagos';
    protected $fillable = [
        'nombre',
    ];
}
