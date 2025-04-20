<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can use the Categorie model to create categories here
        // For example:
        \App\Models\Categorie::factory(10)->create();
        // Or you can create specific categories like this:
        // \App\Models\Categorie::create([
        //     'nom' => 'Sample Category',
        // ]);
        // You can also use factories to generate random data for testing
    }
}
