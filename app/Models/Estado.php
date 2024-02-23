<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $table='estado';
    protected $fillable=['NomEstado'];
    protected $primaryKey='idestado';
    public $timestamps=false;
    use HasFactory;
}
