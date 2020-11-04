<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

    class CategoryFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Category::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                'description' => $this->faker->text($maxNbChars = 200),
                'votes' => $this->faker->randomDigitNotNull(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


}
