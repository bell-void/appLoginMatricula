<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'chats';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_message',
        'bot_response',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}