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
        Schema::table('jugadoras', function (Blueprint $table) {
            // Renombrar 'numero' a 'dorsal'
            $table->renameColumn('numero', 'dorsal');
            
            // Añadir columna 'edat'
            $table->integer('edat')->nullable()->after('dorsal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jugadoras', function (Blueprint $table) {
            // Eliminar columna 'edat'
            $table->dropColumn('edat');
            
            // Renombrar 'dorsal' de vuelta a 'numero'
            $table->renameColumn('dorsal', 'numero');
        });
    }
};