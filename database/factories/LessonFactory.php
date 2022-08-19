<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->bothify('?????-##');
        $start_date = $this->faker->dateTimeBetween($startDate = '-10 years', $endDate = "+10 years", $timezone = null);
        $end_date = $this->faker->dateTimeBetween($startDate = $start_date, $endDate = "+10 years", $timezone = null);
        return [
            'uuid' => $this->faker->uuid(),
            'slug' => Str::slug($name),

            'lesson_identification_name' => $name,
            'period' => $this->faker->randomElement(['morning', 'afternoon','night']),
            'num_registered_students' => $this->faker->numberBetween(12, 50),
            'start_date' => $start_date,
            'end_date'=> $end_date,

            'course_id' => function (array $attributes) {
                return Course::inRandomOrder()->first();
            }
        ];
    }
}
