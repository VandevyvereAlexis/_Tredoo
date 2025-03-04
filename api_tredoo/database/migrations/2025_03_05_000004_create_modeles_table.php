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
        Schema::create('modeles', function (Blueprint $table)
        {
            $table->id();

            // Clé étrangère
            $table->foreignId('marque_id')->constrained('marques')->onDelete('restrict');

            // Nom du modèle
            $table->string('name', 100)->unique()->index();

            // Soft delete et timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modeles');
    }
};
