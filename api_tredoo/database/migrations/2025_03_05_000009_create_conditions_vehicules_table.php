<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('conditions_vehicules', function (Blueprint $table)
        {
            $table->id();
            $table->string('nom', 50)->unique();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('conditions_vehicules');
    }


};
