<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table)
        {
            $table->id();
            $table->boolean('vu')->default(false);
            $table->text('content');

            // Clés étrangères
            $table->foreignId('conversation_id')->nullable()->constrained('conversations')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // Index
            $table->index('conversation_id');
            $table->index('user_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('messages');
    }


};
