<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    public $table='detalleventa';
    protected $fillable=['idventas','iditinerario'];
    protected $primaryKey=['idventas','iditinerario'];
    public $timestamps=false;
    public $incrementing=false; //Se agrego
    use HasFactory;
}
