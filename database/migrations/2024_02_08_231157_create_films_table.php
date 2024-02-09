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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_filma')->nullable();
            $table->string('duzina_filma')->nullable();
            $table->string('zanr')->nullable();
            $table->text('opis')->nullable();
            $table->text('opis_kratak')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('poster')->nullable();
            $table->string('slide_poster')->nullable();            
            $table->string('pocetak_prikazivanja')->nullable();
            $table->text('glumci')->nullable();
            $table->string('reziser')->nullable();
            $table->string('distributer')->nullable();
            $table->integer('trenutno_aktivan')->default(1);            
            $table->double('cena_karte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
