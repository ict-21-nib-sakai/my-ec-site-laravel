<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    #[ArrayShape([
        'payment_method'        => 'string',
        'shipping_address_type' => 'string',
        'shipping_address'      => 'string',
        'user_name'             => 'string',
        'created_at'            => Carbon::class,
        'updated_at'            => Carbon::class,
        'user_id'               => 'int'
    ])]
    public function definition(): array
    {
        return [
            'payment_method'        => $this->faker->word(),
            'shipping_address_type' => $this->faker->word(),
            'shipping_address'      => $this->faker->address(),
            'user_name'             => $this->faker->userName(),
            'created_at'            => now(),
            'updated_at'            => now(),
            'user_id'               => User::inRandomOrder()->first()->id,
        ];
    }
}
