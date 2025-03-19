<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatutConversation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nom'];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
