<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::Create(['usuario' => 'alexis',
    		'password' => bcrypt('6154_54'),
    		'activo' => true,
    		'perfil_id' => 1,
    		'nombre' => 'Alexis Gonzalez',
            'ministerio_id' => 2,
    		'email' => 'zalex60@hotmail.com'
    	]);
    }
}
