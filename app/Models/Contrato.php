<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $primaryKey = 'id_contrato';
    public $timestamps=false;
    
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'id_personal');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
}