<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentLog>
 */
class StudentLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween($startDate = '-10 years', $endDate = "+10 years", $timezone = null);
        $end_date = $this->faker->dateTimeBetween($startDate = $start_date, $endDate = "+10 years", $timezone = null);
        return [
            'uuid' => $this->faker->uuid(),
            'slug' => function (array $attributes) {
                return Str::slug( Student::factory()->create()->first_name.'-Log');
            },
            'start_date' => $start_date,
            'end_date' => $end_date,
            'student_id' => function (array $attributes) {
                return Student::factory()->create();
            },
        ];
    }
}
