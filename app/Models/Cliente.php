<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table='clientes';
    protected $fillable=['nombre','direccion','celular','ciudad','dni'];
    protected $primaryKey='idcliente';
    public $timestamps=false;
    use HasFactory;
}
