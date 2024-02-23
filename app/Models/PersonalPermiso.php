<?php

namespace App\Models;

use App\Models\Personal;
use App\Models\Permiso;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalPermiso extends Model
{

    protected $table = 'personal_permiso';
    public $timestamps = false;
    protected  $fillable=['fecha_ini','fecha_fin'];


    // Relación inversa con la tabla Personal
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'id_personal');
    }

    // Relación inversa con la tabla Permiso
    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'id_permiso');
    }
}
