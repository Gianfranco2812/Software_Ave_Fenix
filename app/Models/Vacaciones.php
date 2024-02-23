<?php

namespace App\Models;
use App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vacaciones extends Model
{
    protected $table = 'vacaciones';
    protected $primaryKey = 'id_vacaciones';
    protected $fillable = ['tipo_vac', 'fecha_ini', 'fecha_fin', 'control'];
    public $timestamps = false;

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'id_personal');
    }

    
}