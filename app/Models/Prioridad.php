<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;

    protected $table='prioridad';
    protected $primaryKey='idprioridad';
    public $timestamps=false;
    protected  $fillable=['descripcion','periodo','control' ];
}



    