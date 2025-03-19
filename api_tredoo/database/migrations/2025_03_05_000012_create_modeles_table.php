<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('modeles', function (Blueprint $table)
        {
            $table->id();
            $table->string('nom', 100)->unique()->index();

            // Clé étrangère
            $table->foreignId('marque_id')->constrained('marques')->onDelete('restrict');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('modeles');
    }


};
