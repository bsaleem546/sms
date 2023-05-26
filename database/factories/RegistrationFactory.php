<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admission>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'religion' => 'islam',
            'cast' => 'abc',
            'blood_group' => $this->faker->randomElement(['A', 'B']),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->address,
            'country' => $this->faker->country,
            'father_name' => $this->faker->name(),
            'mother_name' => $this->faker->name(),
            'class_name' => $this->faker->randomElement(['CLASS 1', 'CLASS 2', 'CLASS 3']),
        ];
    }
}
