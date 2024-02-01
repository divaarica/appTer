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
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('resNumber');
            $table->integer('start')->unsigned();
            $table->integer('end')->unsigned();
            $table->integer('nbPersons');
            $table->integer('price');
            $table->date('date');
            $table->dateTime('qrcode_expiration');
            $table->boolean('state');
            $table->integer('ligne_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->foreignId('user_id')->constrained();
            $table->foreign('ligne_id')->references('id')->on('lignes');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('start')->references('id')->on('regions');
            $table->foreign('end')->references('id')->on('regions');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
