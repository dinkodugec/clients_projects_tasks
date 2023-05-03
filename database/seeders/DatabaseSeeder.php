<?php

namespace Database\Seeders;

use Database\Factories\ClientFactory;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);

       $this->call(ProjectSeeder::class); //create after UserSeeder and ClientSeeder
       $this->call(TaskSeeder::class);
    }
}