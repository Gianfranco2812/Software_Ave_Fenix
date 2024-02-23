<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    
    protected $table='proveedor';
    protected $primaryKey='idproveedor';
    public $timestamps=false;
    protected  $fillable=['ruc','razon_social','direccion','telefono','email','control'];


}

