<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permiso';
    protected $primaryKey = 'id_permiso';
    protected  $fillable=['control','estado','motivo'];
    public $timestamps = false;

    // Relación uno a muchos con la tabla PersonalPermiso
    public function personalPermisos()
    {
        return $this->hasMany(PersonalPermiso::class, 'id_permiso');
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'id_personal', 'id_personal');
    }

    
}