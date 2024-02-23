<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;
    protected $table='postulantes';
    protected $primaryKey='id_postulantes';
    public $timestamps=false;
    protected  $fillable=['dni','nombre','apellidos','edad','estado','direccion','telefono','correo','control', 'id_personal'];



}
