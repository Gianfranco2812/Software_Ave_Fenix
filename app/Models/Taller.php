<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;
    
    
    protected $table='taller';
    protected $primaryKey='idtaller';
    public $timestamps=false;
    protected  $fillable=['ruc','razon_social','direccion','telefono','email','control'];
}
