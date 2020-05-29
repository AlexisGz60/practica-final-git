<?php

use Illuminate\Database\Seeder;
use App\Models\Año;

class AñosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Año::create(['year' => 2019]);
    }
}
