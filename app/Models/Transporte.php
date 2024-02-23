<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $table = 'Transporte';
    protected $primaryKey = 'TransporteID';
    public $timestamps = false;


    protected $fillable = [
        'Año',
        'Descripcion',
        'Estado',
        'Marca',
        'Modelo',
    ];
}
