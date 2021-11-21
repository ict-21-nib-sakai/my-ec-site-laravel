<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    #[ArrayShape([
        'name'       => "string",
        'suspended'  => "bool",
        'sequence'   => "int",
        'created_at' => "\Illuminate\Support\Carbon",
        'updated_at' => "\Illuminate\Support\Carbon"
    ])]
    public function definition(): array
    {
        return [
            'name'       => $this->faker->unique->name(),
            'suspended'  => $this->faker->boolean(10),
            'sequence'   => $this->faker->unique->numerify,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
