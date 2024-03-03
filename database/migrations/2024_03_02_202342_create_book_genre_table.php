<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('book_genre', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('book_id');
        $table->unsignedBigInteger('genre_id');
        // Add other columns as needed
        $table->timestamps();

        // Define foreign key constraints
        $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genre');
    }
};