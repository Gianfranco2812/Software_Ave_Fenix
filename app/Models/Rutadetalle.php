<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutadetalle extends Model
{
    use HasFactory;

    protected $table = 'Rutadetalle';
    protected $primaryKey = 'RutadetalleID';
    public $timestamps = false;

    protected $fillable = [
        'Categoria',
        'RutaID',
        'AgenciaID',
    ];
}
