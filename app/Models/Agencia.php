<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    protected $table = 'Agencia';
    protected $primaryKey = 'AgenciaID';
    public $timestamps = false;

    protected $fillable = [
        'Ciudad',
        'Direccion',
    ];

    public function rutadetalle(): HasMany
    {
          return $this->hasMany(Rutadetalle::class,'AgenciaID');
    }
}
