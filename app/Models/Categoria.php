<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function propiedades() {
        return $this->hasMany(Propiedad::class, 'categoria_id');
    }
    
}
