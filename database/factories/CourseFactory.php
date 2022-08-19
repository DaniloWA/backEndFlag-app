<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Departament;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

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
            'departament_id' => function (array $attributes) {
                return Departament::factory()->create();
            }
        ];
    }
}
