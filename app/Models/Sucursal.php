<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public $table='sucursal';
    protected $fillable=['sucursal','control'];
    protected $primaryKey='id_sucursal';
    public $timestamps=false;
    use HasFactory;
    
    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_sucursal');
    }
}
