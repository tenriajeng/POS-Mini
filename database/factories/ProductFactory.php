<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->text(12),
            'image' => $this->faker->randomElement(
                [
                    "http://lorempixel.com/720/480",
                    "http://lorempixel.com/720/480/sports",
                    "http://placekitten.com/g/720/480",
                    "http://placekitten.com/720/480",
                    "https://picsum.photos/720/480"
                ]
            ),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'stock' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->text(500),
            'status' => $this->faker->numberBetween(1, 0)
        ];
    }
}
