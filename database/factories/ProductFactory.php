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
    public function definition(): array
    {
        return [
            'sku' => $this->faker->unique()->countryCode(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'photo' => $this->faker->image(public_path('storage/images'),640,480, null, false),
            'price' => $this->faker->randomFloat(2, 100000, 200000),
            'taxes' => $this->faker->randomElement([0, 10, 19]),
            'active' => true
        ];
    }
}
