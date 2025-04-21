<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory(10)->create();
        // \App\Models\Tag::factory()->create([
        //     'name' => 'Laravel',
        // ]);
        // \App\Models\Tag::factory()->create([
        //     'name' => 'PHP',
        // ]);
        // \App\Models\Tag::factory()->create([
        //     'name' => 'JavaScript',
        // ]);
        // \App\Models\Tag::factory()->create([
        //     'name' => 'HTML',
        // ]);
        // \App\Models\Tag::factory()->create([
        //     'name' => 'CSS',
        // ]);
    }
}
