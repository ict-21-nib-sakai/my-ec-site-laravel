<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;

    #[ArrayShape([
        'item_name'       => 'string',
        'item_maker'      => 'string',
        'item_unit_price' => 'int',
        'item_color'      => 'string',
        'quantity'        => 'int',
        'canceled_at'     => Carbon::class,
        'order_id'        => 'int',
        'item_id'         => 'int'
    ])]
    public function definition(): array
    {
        return [
            'item_name'       => $this->faker->name(),
            'item_maker'      => $this->faker->word(),
            'item_unit_price' => $this->faker->randomNumber(),
            'item_color'      => $this->faker->colorName(),
            'quantity'        => $this->faker->numberBetween(1, 20),
            'canceled_at'     => now(),
            'order_id'        => Order::inRandomOrder()->first()->id,
            'item_id'         => Item::inRandomOrder()->first()->id,
        ];
    }
}
