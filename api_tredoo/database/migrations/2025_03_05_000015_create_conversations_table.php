<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table)
        {
            $table->id();

            // Clés étrangères
            $table->foreignId('annonce_id')->nullable()->constrained('annonces')->onDelete('set null');
            $table->foreignId('buyer_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('seller_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('statut_conversation_id')->default(1)->constrained('statuts_conversation')->onDelete('restrict');

            // Clé unique
            $table->unique(['annonce_id', 'buyer_id', 'seller_id']);

            $table->timestamp('last_message_at')->nullable()->index();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }


};
