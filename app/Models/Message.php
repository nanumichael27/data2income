<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    public function fromUser()
    {
        return $this->belongsTo(User::class,'from_user');
    }
  
    public function toUser()
    {
        return $this->belongsTo(User::class,'to_user');
    }
}
