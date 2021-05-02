<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class PaymentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'status',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }
}
