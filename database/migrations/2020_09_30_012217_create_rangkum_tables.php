<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangkumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangkuman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('materi_rangkuman')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_siswa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rangkuman');
    }
}
