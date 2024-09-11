<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;
    protected $table = "equipamento";
    public $timestamps = false;

    // Relacionamento com Produto (um Equipamento pertence a um Produto)
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    // Relacionamento com Fabricante (um Equipamento pertence a um Fabricante)
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'id_fabricante');
    }

    // Relacionamento com Maquina (um Equipamento pertence a uma Maquina)
    public function maquina()
    {
        return $this->belongsTo(Maquina::class, 'id_maquina', 'id');
    }
}
