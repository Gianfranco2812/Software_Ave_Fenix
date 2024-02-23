<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $table = 'Paquete';
    protected $primaryKey = 'PaqueteID';
    public $timestamps = false;

    protected $fillable = [
        'Peso',
        'Descripcion',
        'EnvíoID',
    ];
}
