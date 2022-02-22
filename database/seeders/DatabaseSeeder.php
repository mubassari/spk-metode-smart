<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        $arr_values = ['Papuyu', 'Haruan', 'Patin', 'Saluang', 'Sapat', 'Sapat Siam', 'Lais', 'Nila', 'Lele', 'Jelawat', 'Gurame', 'Mujair', 'Mas', 'Bawal'];
        for ($i = 0; $i < count($arr_values); $i++) {
            \App\Models\Alternatif::create([
                'nama' => $arr_values[$i],
            ]);
        }
        $this->call(KriteriaSeeder::class);
        $this->call(ParameterSeeder::class);
        $this->call(NilaiSeeder::class);
    }
}
