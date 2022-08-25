<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
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
        $email = $firstName. '@'. $lastName.'.com';
        return [
            'uuid' => $this->faker->uuid(),
            'slug' => Str::slug( $fullName),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'nif' => $this->faker->randomNumber(9, true),
            'status' => $this->faker->boolean(),
            'sex' => $this->faker->randomElement(['M', 'F']),
            'father_full_name' => $this->faker->name('male'),
            'mother_full_name' => $this->faker->name('female'),
            'email' => $email,
            'phone_num' => $this->faker->e164PhoneNumber(),
            'country' => $this->faker->state(),
            'street_name' => $this->faker->streetName(),
            'postal_code' => $this->faker->postcode(),
            'course_id' => function (array $attributes) {
                return Course::factory()->create();
            }
        ];
    }
}
