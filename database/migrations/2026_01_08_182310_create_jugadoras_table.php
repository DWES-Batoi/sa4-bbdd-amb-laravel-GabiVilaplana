<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorasTable extends Migration
{
    public function up()
    {
        Schema::create('jugadoras', function (Blueprint $table) {
            $table->id();
            $table->string('nom');              // en catalán
            $table->string('cognom');           // en catalán
            $table->integer('numero')->nullable();
            $table->string('posicio')->nullable(); // en catalán
            $table->foreignId('equip_id')->constrained('equips')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jugadoras');
    }
}