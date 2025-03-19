<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    public function up(): void
    {
        Schema::create('annonces', function (Blueprint $table)
        {
            $table->id();
            $table->string('titre', 150);
            $table->boolean('vendu')->default(false);
            $table->boolean('visible')->default(true);
            $table->boolean('premiere_main')->default(false);
            $table->decimal('prix', 12, 2)->index();
            $table->unsignedInteger('kilometrage')->index();
            $table->unsignedSmallInteger('chevaux_fiscaux');
            $table->unsignedSmallInteger('chevaux_din');
            $table->text('description');

            // Localisation
            $table->string('ville', 100)->index();
            $table->char('code_postal', 5)->index();
            $table->float('latitude', 10, 6)->nullable();
            $table->float('longitude', 10, 6)->nullable();

            // Clé étrangère
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('marque_id')->constrained('marques')->onDelete('restrict');
            $table->foreignId('modele_id')->constrained('modeles')->onDelete('restrict');
            $table->foreignId('energie_id')->constrained('energies')->onDelete('restrict');
            $table->foreignId('transmission_id')->constrained('transmissions')->onDelete('restrict');
            $table->foreignId('type_id')->constrained('types_vehicules')->onDelete('restrict');
            $table->foreignId('portes_id')->constrained('portes')->onDelete('restrict');
            $table->foreignId('places_id')->constrained('places')->onDelete('restrict');
            $table->foreignId('couleur_id')->constrained('couleurs')->onDelete('restrict');
            $table->foreignId('condition_id')->constrained('conditions_vehicules')->onDelete('restrict');

            // Indexes et contraintes
            $table->unique(['user_id', 'titre']);
            $table->index(['marque_id', 'modele_id']);
            $table->index(['energie_id', 'transmission_id', 'type_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }


};
