<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projekcijas', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_filma');
            $table->integer('film_id');
            $table->dateTime('datum_i_vreme')->unique();
            $table->string('sala_projekcije');
            $table->double('cena_karte');
            $table->integer('broj_slobodnih_mesta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projekcijas');
    }
};
