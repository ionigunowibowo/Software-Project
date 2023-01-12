<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpDiagnosasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_diagnosa', function (Blueprint $table) {
            $table->unsignedInteger('pasien_id')->nullable();
            $table->unsignedInteger('kerusakan_id')->nullable();
            $table->unsignedInteger('gejala')->nullable();
            $table->unsignedInteger('gejala_terpenuhi')->nullable();
            $table->unsignedInteger('persen')->nullable();

            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kerusakan_id')->references('id')->on('kerusakan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_diagnosa');
    }
}
