<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    protected $table = 'Comprobante';
    protected $primaryKey = 'ComprobanteID';
    public $timestamps = false;

    protected $fillable = [
        'TarifaID',
        'PromociónID',
        'Numero',
        'Monto',
        'Fecha',
        'Observaciones',
    ];

    public function tarifa(): BelongsTo 
    {
          return $this->belongsTo(Tarifa::class,'TarifaID');
    }

    public function promocion(): BelongsTo 
    {
          return $this->belongsTo(Promocion::class,'PromociónID');
    }
}
