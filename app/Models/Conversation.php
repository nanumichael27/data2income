<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function fiirst_user()
    {
        return $this->belongsTo(User::class, 'first_user');
    }

    public function seecond_user()
    {
        return $this->belongsTo(User::class, 'second_user');
    }
}
