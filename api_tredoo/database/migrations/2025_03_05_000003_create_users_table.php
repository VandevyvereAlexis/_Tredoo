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
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();

            // Clé étrangère
            $table->foreignId('role_id')->default(1)->constrained('roles')->onDelete('restrict');

            // Informations utilisateur
            $table->string('pseudo', 50)->unique();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image', 255)->default('default.jpg');

            // Vérification de l'email et authentification
            $table->timestamp('email_verified_at')->nullable()->index();
            $table->rememberToken();

            // Soft delete et timestamps
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
