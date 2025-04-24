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
        Schema::table('organisateurs', function (Blueprint $table) {
            $table->string('ville')->nullable();
            $table->string('adresse')->nullable();
            $table->string('codePostal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organisateur', function (Blueprint $table) {
            $table->dropColumn(['ville', 'adresse', 'codePostal']);
        });
    }
};
