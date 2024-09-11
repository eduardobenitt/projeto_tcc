<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class HashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuarios:hash-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aplica bcrypt nas senhas dos usuários';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usuarios = Usuario::all();
        foreach ($usuarios as $usuario) {
            $usuario->senha = Hash::make($usuario->senha);
            $usuario->save();
        }

        $this->info('Senhas dos usuários foram hasheadas com sucesso!');
        return 0;
    }
}
