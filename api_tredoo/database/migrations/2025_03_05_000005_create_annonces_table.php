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
        Schema::create('annonces', function (Blueprint $table)
        {
            $table->id();

            // Clé étrangère
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('marque_id')->nullable()->constrained('marques')->onDelete('restrict');
            $table->foreignId('modele_id')->nullable()->constrained('modeles')->onDelete('restrict');

            // Infos générales
            $table->string('titre', 150);
            $table->boolean('vendu')->default(false);
            $table->boolean('visible')->default(true);
            $table->boolean('premiere_main')->default(false);
            $table->decimal('prix', 10, 2)->index();
            $table->unsignedInteger('kilometrage')->index();
            $table->unsignedSmallInteger('chevaux_fiscaux');
            $table->unsignedSmallInteger('chevaux_din');

            // Localisation
            $table->string('ville', 100)->index();
            $table->char('code_postal', 5)->index();
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();

            // Description
            $table->text('description');

            // Caractéristiques du véhicule
            $table->enum('energie', ['essence', 'diesel', 'hybride', 'electrique', 'gpl', 'gaz_naturel_cgn', 'autre'])->default('autre');
            $table->enum('transmission', ['automatique', 'manuelle'])->default('manuelle');
            $table->enum('type', ['4x4_suv_crossover', 'Citadine', 'berline', 'break', 'cabriolet', 'coupé', 'monospace_minibus', 'commerciale_société', 'sans_permis', 'autre'])->default('autre');
            $table->enum('portes', ['3_portes', '4_portes', '5_portes', '6_portes_ou_plus'])->default('5_portes');
            $table->enum('place', ['1_place', '2_places', '3_places', '4_places', '5_places', '6_places', '7_ou_plus'])->default('5_places');
            $table->enum('couleur', ['blanc', 'noir', 'gris', 'argent', 'bleu', 'rouge', 'vert', 'marron', 'beige', 'jaune', 'autre'])->default('autre');
            $table->enum('condition', ['sans_frais_a_prevoir', 'roulante_reparation_a_prevoir', 'non_roulante', 'accidentee', 'pour_pieces'])->default('sans_frais_a_prevoir');

            // Suppression douce pour permettre la restauration d'une annonce supprimée
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
        Schema::dropIfExists('annonces');
    }
};
