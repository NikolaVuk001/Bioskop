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
        Schema::create('racuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');            
            $table->string('payment_type')->nullable();
            $table->string('peyment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency');
            $table->float('uk_Cena',8,2);
            $table->string('racun_br');
            $table->string('invocie_no');
            $table->string('racun_datum');
            $table->string('racun_mesec');
            $table->string('racun_godina');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
 

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racuns');
    }
};
