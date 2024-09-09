<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;
    protected $table = "maquina";
    public $timestamps = false;

    // Relacionamento com Fabricante (uma Maquina pertence a um Fabricante)
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'id_fabricante');
    }

    // Relacionamento com Usuario (uma Maquina pertence a um Usuario)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

}
