<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','telefono'];

    public function propiedades() {
        return $this->hasMany(Propiedad::class, 'agente_id');
    }
    
}
