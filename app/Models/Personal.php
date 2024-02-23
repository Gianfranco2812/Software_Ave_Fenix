<?php

namespace App\Models;

use App\Models\PersonalPermiso;
use App\Models\PersonalVacaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table='personal';
    protected $primaryKey='id_personal';
    public $timestamps=false;
    protected  $fillable=['dni','nombre','apellidos','edad','genero','estado_civil','direccion','telefono','email','control','fecha_nac','num_licencia','tip_licencia'];

    
    public function bus() 
    {
        return $this->HasMany(Bus::class,'idbus','idbus');
    }

    public function permisos()
    {
        return $this->hasMany(PersonalPermiso::class, 'id_personal');
    }
    
    public function vacaciones()
    {
        return $this->hasMany(PersonalVacaciones::class, 'id_personal');
    }
    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_personal');
    }
}
