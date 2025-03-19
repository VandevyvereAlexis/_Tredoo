<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titre', 'vendu', 'visible', 'premiere_main', 'prix', 'kilometrage',
        'chevaux_fiscaux', 'chevaux_din', 'description', 'ville', 'code_postal',
        'latitude', 'longitude', 'user_id', 'marque_id', 'modele_id', 'energie_id',
        'transmission_id', 'type_id', 'portes_id', 'places_id', 'couleur_id', 'condition_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
