<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Database\Factories\OrderFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->createMany([
            [
                'id' => 1,
                'type' => 'Könyv',
            ],
            [
                'id' => 2,
                'type' => 'magazin',
            ],
            [
                'id' => 3,
                'type' => 'napilap',
            ],
            [
                'id' => 4,
                'type' => 'szórólap',
            ]
        ]);

        OrderFactory::new()->count(20)->create();
    }
}
