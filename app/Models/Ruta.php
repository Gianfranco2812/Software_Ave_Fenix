<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'Ruta';
    protected $primaryKey = 'RutaID';
    public $timestamps = false;

    protected $fillable = [
        'Duracionaprox',
    ];

    public function agencia(): BelongsToMany
    {
          return $this->belongsToMany(Agencia::class, 'rutadetalle', 'RutaID', 'AgenciaID')->withPivot('Categoria');
    }

    
}
