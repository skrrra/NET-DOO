<?php

namespace Database\Factories;

use App\Models\CategoryParent;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryParentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryParent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::all()->random()->id,
            'parent_id' => \App\Models\Category::all()->random()->id,
        ];
    }
}
