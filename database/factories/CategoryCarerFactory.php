<?php

namespace Database\Factories;

use App\Models\CategoryCarer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryCarerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryCarer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cc_name' => $this->faker->word,
            'cc_desc' => $this->faker->paragraph,
            'cc_status' => true
        ];
    }
}
