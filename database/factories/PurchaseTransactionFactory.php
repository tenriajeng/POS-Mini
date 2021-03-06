<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stock = $this->faker->numberBetween(1, 100);
        $price = $this->faker->numberBetween(10000, 1000000) * $stock;
        $product = Product::all()->random()->first();

        return [
            'supplier_id' => $product->supplier_id,
            'product_id' => $product->id,
            'price' => $price,
            'stock' => $stock,
        ];
    }
}
