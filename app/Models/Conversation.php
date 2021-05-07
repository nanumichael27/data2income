<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function firstUser()
    {
        return $this->belongsTo(User::class, 'first_user');
    }

    public function secondUser()
    {
        return $this->belongsTo(User::class, 'second_user');
    }

    public function lastMessage(){
        return $this->messages()->orderBy('id', 'desc')->first();
    }
}
