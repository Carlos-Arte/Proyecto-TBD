<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categorias;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('es_MX');

       // \App\Models\Usuarios::factory(40)->create();
        \App\Models\Categorias::factory(5)->create();
        // User::factory(10)->create();

       /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
