<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KerdesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kerdes = [
            'question' => $this->faker->sentence(),
            'order_number' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->randomElement(['string', 'number', 'list', 'boolean']),
            'is_predictive' => $this->faker->boolean(),
            'correct_answer' => Str::random(10),
        ];
        if($kerdes["type"] == "list"){
            $option_count = $this->faker->numberBetween(3, 6);
            $temp = [];
            for($i = 0; $i < $option_count; $i++){
                array_push($temp, $this->faker->word());
            }
            $kerdes["answers"] = implode('|', $temp);
        }
        return $kerdes;
    }
}
