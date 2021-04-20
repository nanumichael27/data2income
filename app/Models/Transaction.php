<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
    'transaction_type',
    'payment_type',
    'status',
    'tx_ref',
    'payment_ref',
    'amount',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function refrenceExists($id){
        return self::where('tx_ref', '=', $id)->first()? true : false; 
    }

    public static function generateTransactionRefrence(){
        $tx_ref = "REF". rand(1000000, 9999999);
        return self::refrenceExists($tx_ref)? self::generateTransactionRefrence(): $tx_ref;
    }

}
