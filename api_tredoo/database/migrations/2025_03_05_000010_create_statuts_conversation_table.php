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
        Schema::create('statuts_conversation', function (Blueprint $table)
        {
            $table->id();

            // Clés étrangères
            $table->foreignId('conversation_id')->constrained('conversations')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Statut de la conversation
            $table->enum('status', ['visible', 'supprimee'])->default('visible');

            // Empêcher qu'un utilisateur ait plusieurs statuts pour la même conversation
            $table->unique(['conversation_id', 'user_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuts_conversation');
    }
};
