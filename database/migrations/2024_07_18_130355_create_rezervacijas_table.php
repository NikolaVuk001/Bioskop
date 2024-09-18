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
        Schema::create('rezervacijas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projekcija_id');                   
            $table->string('ime_i_prezime');            
            $table->string('email');
            $table->string('sediste');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('cena',8,2);
            $table->string('datum');
            $table->string('vreme');
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('film_id');   
            $table->boolean("aktivna")->default(true);                      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezervacijas');
    }
};
