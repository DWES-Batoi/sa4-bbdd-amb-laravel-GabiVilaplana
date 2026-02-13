<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('local_id')->constrained('equips')->onDelete('cascade');
            $table->foreignId('visitant_id')->constrained('equips')->onDelete('cascade');
            $table->foreignId('estadi_id')->constrained('estadis')->onDelete('cascade');
            $table->date('data');
            $table->integer('jornada');
            $table->integer('gols_local')->default(0);
            $table->integer('gols_visitant')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partits');
    }
};