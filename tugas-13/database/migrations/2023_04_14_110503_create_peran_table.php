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
        Schema::create('peran', function (Blueprint $table) {
            $table->bigIncrements('id_peran');
            $table->bigInteger('id_film')->unsigned();
            $table->bigInteger('id_cast')->unsigned();
            $table->string('nama',45);
            $table->timestamps();
        });
        Schema::table('peran', function (Blueprint $table) {
            $table->foreign('id_film')->references('id_film')->on('film')->onDelete('cascade');
            $table->foreign('id_cast')->references('id_cast')->on('cast')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peran');
    }
};