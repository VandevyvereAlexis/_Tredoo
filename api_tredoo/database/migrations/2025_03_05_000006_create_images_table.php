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
        Schema::create('images', function (Blueprint $table)
        {
            $table->id();

            // Clé étrangère
            $table->foreignId('annonce_id')->constrained('annonces')->onDelete('cascade');

            // Stockage de l'image
            $table->string('url')->unique();

            // Position des images dans la galerie
            $table->unsignedSmallInteger('position')->nullable()->index();

            // Empêcher deux images d'avoir la même position dans une annonce
            $table->unique(['annonce_id', 'position']);

            // Timestamps et suppression douce
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
