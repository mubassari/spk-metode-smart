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
        $kriteria_ = \App\Models\Kriteria::all();
        foreach ($alternatif_ as $alternatif) {
            foreach ($kriteria_ as $kriteria) {
                $parameter = \App\Models\Parameter::where('id_kriteria', $kriteria->id)->inRandomOrder()->first();
                \App\Models\Nilai::create([
                    'id_alternatif' => $alternatif->id,
                    'id_kriteria' => $parameter->id_kriteria,
                    'id_parameter' => $parameter->id,
                ]);
            }
        }
    }
}
