<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class CartFactory extends factory
{
    protected $model = cart::class;

    #[arrayshape([
        'quantity'   => "int",
        'created_at' => "\Illuminate\Support\Carbon",
        'updated_at' => "\Illuminate\Support\Carbon",
        'user_id'    => "int",
        'item_id'    => "int"
    ])]
    public function definition(): array
    {
        $users = User::all()->pluck('id');
        $items = Item::all()->pluck('id');
        $matrix = $users->crossJoin($items);
        $pair = $this->faker->unique()->randomElement($matrix);

        return [
            'quantity'   => $this->faker->randomnumber(),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
            'user_id'    => $pair[0],
            'item_id'    => $pair[1],
        ];
    }
}
