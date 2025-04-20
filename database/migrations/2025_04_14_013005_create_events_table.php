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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->time('time')->nullable();
            $table->string('location');
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'cancelled', 'completed'])->default('active'); // Statut
            $table->integer('max_participants')->nullable();

            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
