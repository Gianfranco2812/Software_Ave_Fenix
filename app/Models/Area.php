<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table='area';
    protected $fillable=['area','control'];
    protected $primaryKey='id_area';
    public $timestamps=false;
    use HasFactory;
    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'id_area');
    }
}
