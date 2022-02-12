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
        $kreteria_ = \App\Models\Kreteria::all();
        foreach ($kreteria_ as $kreteria) {
            if ($kreteria->kode === 'C01') {
                for ($i = 0; $i < 3; $i++) {
                    $arr_values = [['Ph air < 5', 25], ['Ph air 5 < 8', 50], ['Ph air > 8', 25]];
                    $value = $faker->unique()->randomElement($arr_values);
                    \App\Models\Parameter::create([
                        'nama_subkreteria' => $value[0],
                        'bobot' => $value[1],
                        'kreteria_id' => $kreteria->id,
                    ]);
                }
            } elseif ($kreteria->kode === 'C02') {
                for ($i = 0; $i < 3; $i++) {
                    $arr_values = [['< 28-310C', 50], ['=>28-310C', 35], ['>310C', 15]];
                    $value = $faker->unique()->randomElement($arr_values);
                    \App\Models\Parameter::create([
                        'nama_subkreteria' => $value[0],
                        'bobot' => $value[1],
                        'kreteria_id' => $kreteria->id,
                    ]);
                }
            } elseif ($kreteria->kode === 'C03') {
                for ($i = 0; $i < 2; $i++) {
                    $arr_values = [['>3 mg/l', 70], ['<3 mg/l', 30]];
                    $value = $faker->unique()->randomElement($arr_values);
                    \App\Models\Parameter::create([
                        'nama_subkreteria' => $value[0],
                        'bobot' => $value[1],
                        'kreteria_id' => $kreteria->id,
                    ]);
                }
            } elseif ($kreteria->kode === 'C04') {
                for ($i = 0; $i < 2; $i++) {
                    $arr_values = [['<0,1 mg/l', 70], ['<0,1 mg/l', 30]];
                    $value = $faker->unique()->randomElement($arr_values);
                    \App\Models\Parameter::create([
                        'nama_subkreteria' => $value[0],
                        'bobot' => $value[1],
                        'kreteria_id' => $kreteria->id,
                    ]);
                }
            } elseif ($kreteria->kode === 'C05') {
                for ($i = 0; $i < 2; $i++) {
                    $arr_values = [['<1 mg/l', 70], ['<1 mg/l', 30]];
                    $value = $faker->unique()->randomElement($arr_values);
                    \App\Models\Parameter::create([
                        'nama_subkreteria' => $value[0],
                        'bobot' => $value[1],
                        'kreteria_id' => $kreteria->id,
                    ]);
                }
            } elseif ($kreteria->kode === 'C06') {
                for ($i = 0; $i < 2; $i++) {
                    $arr_values = [['>25 cm', 70], ['<25 cm', 30]];
                    $value = $faker->unique()->randomElement($arr_values);
                    \App\Models\Parameter::create([
                        'nama_subkreteria' => $value[0],
                        'bobot' => $value[1],
                        'kreteria_id' => $kreteria->id,
                    ]);
                }
            }
        }
    }
}
