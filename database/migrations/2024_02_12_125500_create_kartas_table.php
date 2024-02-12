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
        Schema::create('kartas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projekcija_id');
            $table->string('racun_id');            
            $table->string('sediste');
            $table->float('cena',8,2);
            $table->string('datum');
            $table->string('vreme');
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('film_id');                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartas');
    }
};
