<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlternatifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arr_values = ['Papuyu', 'Haruan', 'Patin', 'Saluang', 'Sapat'];
        $value = $this->faker->unique()->randomElement($arr_values);
        return [
            'nama' => $value,
        ];
    }
}
