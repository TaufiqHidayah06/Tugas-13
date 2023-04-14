<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->bigIncrements('id_film');
            $table->string('judul', 45);
            $table->text('ringkasan');
            $table->year('tahun');
            $table->string('poster', 45);
            $table->bigInteger('id_genre')->unsigned();
            $table->timestamps();
        });
        Schema::table('film', function (Blueprint $table) {
            $table->foreign('id_genre')->references('id_genre')->on('genre')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film');
    }
};