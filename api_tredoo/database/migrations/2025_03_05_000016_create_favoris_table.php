<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('favoris', function (Blueprint $table)
        {
            $table->id();

            // Clés étrangères
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('annonce_id')->constrained('annonces')->cascadeOnDelete();

            // Clé unique
            $table->unique(['user_id', 'annonce_id']);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('favoris');
    }


};
