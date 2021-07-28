<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Categories::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(),
            'category_id' => $this->faker->randomElement($category)
        ];
    }
}
