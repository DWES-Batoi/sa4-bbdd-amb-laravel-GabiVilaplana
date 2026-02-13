<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jugadoras', function (Blueprint $table) {
            $table->string('cognom')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('jugadoras', function (Blueprint $table) {
            $table->string('cognom')->nullable(false)->change();
        });
    }
};