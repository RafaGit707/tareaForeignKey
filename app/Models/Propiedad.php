<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;
    protected $table = 'propiedades';
    protected $fillable = ['titulo', 'descripcion', 'precio', 'agente_id', 'categoria_id'];


    public function agente()
    {
        return $this->belongsTo(Agente::class, 'agente_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function up() {
        Schema::table('propiedades', function (Blueprint $table) {
            $table->decimal('precio', 10, 2)->after('categoria_id');
        });
    }    
    
}
