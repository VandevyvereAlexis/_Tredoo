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
        Schema::create('messages', function (Blueprint $table)
        {
            $table->id();

            // Clés étrangères
            $table->foreignId('conversation_id')->nullable()->constrained('conversations')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // Informations du message
            $table->boolean('vu')->default(false);
            $table->text('content');

            // Permettre aux utilisateurs de supprimer un message sans impacter les autres
            $table->softDeletes();

            // Horodatage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
