<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $alternatif_ = \App\Models\Alternatif::all();
        foreach ($alternatif_ as $alternatif) {
            for ($i = 1; $i <= 6; $i++) {
                $parameter_ = \App\Models\Parameter::where('id_kriteria', $i)->get();
                $parameter = $faker->randomElement($parameter_);
                \App\Models\Nilai::create([
                    'id_alternatif' => $alternatif->id,
                    'id_kriteria' => $parameter->id_kriteria,
                    'id_parameter' => $parameter->id,
                ]);
            }
        }
    }
}
