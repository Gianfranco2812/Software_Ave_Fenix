<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalVacaciones extends Model
{

    protected $table = 'personal_vacaciones';
    public $timestamps = false;
    protected $fillable = ['id_personal', 'id_vacaciones'];


    public function personal()
    {
        return $this->belongsTo(Personal::class, 'id_personal', 'dni');
    }

    // Relationship with the Vacaciones model
    public function vacaciones()
    {
        return $this->belongsTo(Vacaciones::class, 'id_vacaciones', 'id_vacaciones');
    }
}
