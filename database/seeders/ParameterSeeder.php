<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $kriteria_ = \App\Models\Kriteria::all();
        foreach ($kriteria_ as $kriteria) {
            if ($kriteria->id == '1') {
                $arr_values = [['Ph air < 5', 25], ['Ph air 5 < 8', 50], ['Ph air > 8', 25]];
            } elseif ($kriteria->id == '2') {
                $arr_values = [['< 28-310C', 50], ['=>28-310C', 35], ['>310C', 15]];
            } elseif ($kriteria->id == '3') {
                $arr_values = [['>3 mg/l', 70], ['<3 mg/l', 30]];
            } elseif ($kriteria->id == '4') {
                $arr_values = [['<0,1 mg/l', 70], ['<0,1 mg/l', 30]];
            } elseif ($kriteria->id == '5') {
                $arr_values = [['<1 mg/l', 70], ['<1 mg/l', 30]];
            } elseif ($kriteria->id == '6') {
                $arr_values = [['>25 cm', 70], ['<25 cm', 30]];
            }

            for ($i = 0; $i < sizeof($arr_values); $i++) {
                $value = $faker->unique()->randomElement($arr_values);
                \App\Models\Parameter::create([
                    'nama' => $value[0],
                    'bobot' => $value[1],
                    'id_kriteria' => $kriteria->id,
                ]);
            }
        }
    }
}
