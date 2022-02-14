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
        \App\Models\Alternatif::factory(5)->create();
        $this->call(KriteriaSeeder::class);
        $this->call(ParameterSeeder::class);
        $this->call(NilaiSeeder::class);
    }
}
