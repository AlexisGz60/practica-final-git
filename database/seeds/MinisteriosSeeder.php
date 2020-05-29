<?php

use Illuminate\Database\Seeder;
use App\Models\Ministerio;

class MinisteriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Ministerio::Create(['nombre' => 'Pastorado',
    		'descripcion' => 'Dirigente de la Iglesia',
    		'año_id' => 1, 'status'=> 1
    	]);
    Ministerio::Create(['nombre' => 'Alavanza',
    		'descripcion' => 'Grupo Fuego de Dios',
    		'año_id' => 1, 'status'=> 1
    	]);
    }
}
