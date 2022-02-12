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
            if ($alternatif->kode === 'A01') {
                for ($i = 1; $i <= 6; $i++) {
                    $parameter_ = \App\Models\Parameter::where('Kreteria_id', $i)->get();
                    $parameter = $faker->randomElement($parameter_);
                    \App\Models\Nilai::create([
                        'alternatif_id' => $alternatif->id,
                        'parameter_id' => $parameter->id,
                    ]);
                }
            } elseif ($alternatif->kode === 'A02') {
                for ($i = 1; $i <= 6; $i++) {
                    $parameter_ = \App\Models\Parameter::where('Kreteria_id', $i)->get();
                    $parameter = $faker->randomElement($parameter_);
                    \App\Models\Nilai::create([
                        'alternatif_id' => $alternatif->id,
                        'parameter_id' => $parameter->id,
                    ]);
                }
            } elseif ($alternatif->kode === 'A03') {
                for ($i = 1; $i <= 6; $i++) {
                    $parameter_ = \App\Models\Parameter::where('Kreteria_id', $i)->get();
                    $parameter = $faker->randomElement($parameter_);
                    \App\Models\Nilai::create([
                        'alternatif_id' => $alternatif->id,
                        'parameter_id' => $parameter->id,
                    ]);
                }
            } elseif ($alternatif->kode === 'A04') {
                for ($i = 1; $i <= 6; $i++) {
                    $parameter_ = \App\Models\Parameter::where('Kreteria_id', $i)->get();
                    $parameter = $faker->randomElement($parameter_);
                    \App\Models\Nilai::create([
                        'alternatif_id' => $alternatif->id,
                        'parameter_id' => $parameter->id,
                    ]);
                }
            } elseif ($alternatif->kode === 'A05') {
                for ($i = 1; $i <= 6; $i++) {
                    $parameter_ = \App\Models\Parameter::where('Kreteria_id', $i)->get();
                    $parameter = $faker->randomElement($parameter_);
                    \App\Models\Nilai::create([
                        'alternatif_id' => $alternatif->id,
                        'parameter_id' => $parameter->id,
                    ]);
                }
            }
        }
    }
}
