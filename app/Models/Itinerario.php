<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    public $table='itinerario';
    protected $fillable=['Nomciudad','PrecioCiud','NomServicio','PrecioServ','asientos','horaida','horallegada'];
    protected $primaryKey='iditinerario';
    public $timestamps=false;
    use HasFactory;
}
