<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('images', function (Blueprint $table)
        {
            $table->id();
            $table->string('url')->unique();
            $table->unsignedSmallInteger('position')->nullable();

            // Clé étrangère
            $table->foreignId('annonce_id')->constrained('annonces')->onDelete('cascade');

            // Clé unique
            $table->unique(['annonce_id', 'position']);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('images');
    }


};
