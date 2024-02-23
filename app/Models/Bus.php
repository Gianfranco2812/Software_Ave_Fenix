<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table='bus';
    protected $primaryKey='idbus';
    public $timestamps=false;
    protected  $fillable=['id_personal','cod_institucional','anio_fabricacion','peso_toneladas','num_cilindros','num_ocupantes','tipo_transmision','num_ejes','num_ruedas','cod_neumaticos','potencia','torque','ancho','largo','alto','placa','num_motor','num_chasis','modelo','combustible','estado_actual','valor','control'];

    public function personal() 
    {
          return $this->hasOne(Personal::class,'id_personal','id_personal');
    }



}
