<?php

namespace Database\Factories;

use App\Models\Departament;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        $fullName =  $firstName . ' ' . $lastName;

        return [
            'uuid' => $this->faker->uuid(),
            'slug' => Str::slug($fullName),
            'first_name' =>  $firstName,
            'last_name' => $lastName,
            'status' => $this->faker->boolean(),
            'departament_id' => function (array $attributes) {
                return Departament::factory()->create();
            }
        ];
    }
}
