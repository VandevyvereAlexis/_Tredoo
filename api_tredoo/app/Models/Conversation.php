<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['annonce_id', 'buyer_id', 'seller_id', 'statut_conversation_id', 'last_message_at'];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

    public function statut()
    {
        return $this->belongsTo(StatutConversation::class, 'statut_conversation_id');
    }
}
