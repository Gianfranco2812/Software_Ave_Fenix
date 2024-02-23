<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $table = 'Envío';
    protected $primaryKey = 'EnvíoID';
    public $timestamps = false;

    protected $fillable = [
        'Clave',
        'Destinatario',
        'Fecha',
        'ClienteID',
        'ComprobanteID',
        'TransporteID',
        'RutaID',
    ];

    public function comprobante(): HasOne 
    {
          return $this->hasOne(Comprobante::class,'ComprobanteID');
    }

    public function transporte(): BelongsTo 
    {
          return $this->belongsTo(Transporte::class,'TransporteID');
    }
    
    public function ruta(): BelongsTo 
    {
          return $this->belongsTo(Ruta::class,'RutaID');
    }

    public function cliente(): BelongsTo 
    {
          return $this->belongsTo(Cliente::class,'ClienteID', 'idcliente');
    }

    public function paquete(): HasMany 
    {
          return $this->hasMany(Paquete::class,'PaqueteID');
    }
}
