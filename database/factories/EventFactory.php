<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Organisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'location' => $this->faker->address(),
            'category_id' => Categorie::factory(),
            'image' => $this->faker->imageUrl(640, 480, 'events'),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            'max_participants' => $this->faker->numberBetween(10, 100),
            'time' => $this->faker->time(),
            'prix' => $this->faker->randomFloat(2, 0, 100),
            'organisateur_id' => Organisateur::inRandomOrder()->first()->id
,
        ];
    }
}
