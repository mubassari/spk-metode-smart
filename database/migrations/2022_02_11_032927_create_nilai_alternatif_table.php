<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_alternatif")->references("id")->on("alternatif")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("id_kriteria")->references("id")->on("kriteria")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("id_sub_kriteria")->references("id")->on("sub_kriteria")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_alternatif');
    }
}
