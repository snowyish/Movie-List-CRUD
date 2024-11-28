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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('synopsis')->default('No synopsis available');
            $table->string('genre');
            $table->year('year_released');
            $table->string('language')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->text('casts')->nullable();
            $table->string('director')->nullable();
            $table->string('writers')->nullable();
            $table->string('poster')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
