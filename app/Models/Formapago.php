<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formapago extends Model
{
    public $table='formapago';
    protected $fillable=['formapago'];
    protected $primaryKey='idformapago';
    public $timestamps=false;
    use HasFactory;
}
