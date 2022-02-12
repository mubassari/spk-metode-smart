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
        $arr_values = [['A01', 'Papuyu'], ['A02', 'Haruan'], ['A03', 'Patin'], ['A04', 'Saluang'], ['A05', 'Sapat']];
        $value = $this->faker->unique()->randomElement($arr_values);
        return [
            'kode' => $value[0],
            'nama_alternatif' => $value[1],
        ];
    }
}
