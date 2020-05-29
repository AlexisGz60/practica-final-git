<?php

use Illuminate\Database\Seeder;

use App\Models\Perfil;

class PerfilesSeeder extends Seeder
{

    public function run()
    {
    	Perfil::create(['nombre' => 'Administrador']);
    	Perfil::create(['nombre' => 'Captura']);
		Perfil::create(['nombre' => 'Consulta']);
		Perfil::create(['nombre' => 'Movil']);
    }
}
