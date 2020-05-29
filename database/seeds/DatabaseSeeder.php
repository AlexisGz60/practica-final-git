<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AñosSeeder::class);
        $this->call(PerfilesSeeder::class);
        $this->call(MinisteriosSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
