<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'name'              => "string",
        'email'             => "string",
        'email_verified_at' => Carbon::class,
        'password'          => "string",
        'remember_token'    => "string",
        'home_address'      => "string",
        'suspended'         => "bool",
        'created_at'        => Carbon::class,
        'updated_at'        => Carbon::class,
    ])]
    public function definition(): array
    {
        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'home_address'      => $this->faker->address(),
            'suspended'         => $this->faker->boolean(10),
            'created_at'        => now(),
            'updated_at'        => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
