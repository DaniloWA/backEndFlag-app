<?php

namespace Database\Factories;

use App\Models\Departament;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word();
        return [
            'uuid' => $this->faker->uuid(),
            'slug' => Str::slug($name),

            'name' => $name,
            'workload' => $this->faker->numberBetween(3000, 12000),
            'description' => $this->faker->paragraph(),
            'num_registered_students' => $this->faker->numberBetween(12, 50),
            'departament_id' => function (array $attributes) {
                return Departament::factory()->create();
            }
        ];
    }
}

