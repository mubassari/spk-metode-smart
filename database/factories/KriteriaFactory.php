<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KriteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $arr_values = [['Ph Air', 60]];
        $arr_values = [['Ph Air', 60], ['Suhu', 50], ['Oksigen Terlarut', 50], ['Kandungan Amoniak', 50], ['Kandungan Nitrit', 50], ['Kecerahan Air', 50]];
        $value = $this->faker->unique()->randomElement($arr_values);
        return [
            'nama' => $value[0],
            'bobot' => $value[1],
        ];
    }
}
