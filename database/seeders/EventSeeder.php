<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can use the Event model to create events here
        // For example:
        \App\Models\Event::factory(10)->create();
        // Or you can create specific events like this:
        // \App\Models\Event::create([
        //     'title' => 'Sample Event',
        //     'description' => 'This is a sample event description.',
        //     'date' => now(),
        //     'location' => 'Sample Location',
        //     'category_id' => 1,
        //     'image' => 'sample.jpg',
        //     'status' => 'active',
        //     'max_participants' => 100,
        // ]);
        // You can also use factories to generate random data for testing
    }
}
