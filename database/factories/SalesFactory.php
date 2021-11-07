<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sales::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stock = $this->faker->numberBetween(1, 100);
        $price = $this->faker->numberBetween(10000, 1000000) * $stock;

        return [
            'product_id' => Product::all()->random()->id,
            'customer_id' => Customer::all()->random()->id,
            'price' => $price,
            'stock' => $stock,
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }
}
