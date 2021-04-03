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
            'name' => $this->faker->domainWord(),
            'price' => $this->faker->randomFloat(2),
            'amount' => $this->faker->numberBetween(1, 999),
            'state' => $this->faker->numberBetween(0,2),
            'image_url' => '/images/image-net-doo-2021-1617352735.jpg',
            'active' => 1
        ];
    }
}
