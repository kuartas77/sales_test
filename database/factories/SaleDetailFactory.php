<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SaleDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'sale_id' => Sale::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'unit_value' => $this->faker->randomFloat(2, 100000, 200000),
            'quantity' => $this->faker->randomNumber(1),
        ];
    }
}
