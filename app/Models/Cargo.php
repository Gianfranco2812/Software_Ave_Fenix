<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $primaryKey = 'id_cargo';
    public $timestamps = false;
    protected $fillable = [
            'cargo',
            'descripcion',
            'id_area',
            'control',
        ];
        public function area()
        {
            return $this->belongsTo(Area::class, 'id_area');
        }
        public function contratos()
        {
            return $this->hasMany(Contrato::class, 'id_cargo');
        }
}
