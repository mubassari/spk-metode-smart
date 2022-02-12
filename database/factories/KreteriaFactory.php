<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KreteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arr_values = [['C01', 'Ph Air', 60], ['C02', 'Suhu', 50], ['C03', 'Oksigen Terlarut', 50], ['C04', 'Kandungan Amoniak', 50], ['C05', 'Kandungan Nitrit', 50], ['C06', 'Kecerahan Air', 50]];
        // $arr_values = [['C01', 'Ph Air', 60]];
        $value = $this->faker->unique()->randomElement($arr_values);
        return [
            'kode' => $value[0],
            'nama_kreteria' => $value[1],
            'bobot' => $value[2],
        ];
    }
}
