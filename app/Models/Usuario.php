<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use  Notifiable, HasFactory;
    protected $table = "usuario";
    public $timestamps = false;

    protected $hidden = [
        'senha',
    ];

    public function getAuthPassword()
    {
        return $this->senha; // Aqui você informa que o campo 'senha' na sua tabela é o campo usado como password
    }
}
