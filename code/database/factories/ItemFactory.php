<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    #[ArrayShape([
        'name'        => "string",
        'color'       => "string",
        'unit_price'  => "int",
        'stock'       => "int",
        'recommended' => "bool",
        'suspended'   => "bool",
        'created_at'  => "\Illuminate\Support\Carbon",
        'updated_at'  => "\Illuminate\Support\Carbon",
        'maker'       => "string",
        'category_id' => "int"
    ])]
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name(),
            'color'       => $this->faker->word(),
            'unit_price'  => $this->faker->numberBetween(100, 1000000),
            'stock'       => $this->faker->numberBetween(5, 200),
            'recommended' => $this->faker->boolean(10),
            'suspended'   => $this->faker->boolean(5),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
            'maker'       => $this->faker->word(),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
