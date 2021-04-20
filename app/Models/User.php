<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'balance',
        'activated',
        'referred_by',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'balance' => 'float',
    ];

    public function joborders(){
        return $this->hasMany(JobOrder::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function fundAccount($amount = 0){
        $this->balance += intval($amount);
        $this->save();
    }

    public function createTransaction($amount){
        $tx_ref = Transaction::generateTransactionRefrence();
        $transaction = new Transaction([
            "amount" => $amount,
            "transaction_type" => 'fund account',
            "payment_type" => 'flutterwave',
            "tx_ref" => $tx_ref,
        ]);

        $res = $this->transactions()->save($transaction);
        if($res) return $tx_ref;
    }


    public function chargeAccount($amount){
        $this->balance = $this->balance - $amount;
        $this->save();
    }

    public function getTotalPayments(){
        return count($this->transactions);
    }

    public function referUser(User $user){

    }

    public function getJobs(){

    }
    
    public function numberOfActiveJobs(){
        return count(Job::active());
    }

    public function numberOfCompletedJobs(){
        return $this->joborders()->count();
    }

    public function getCompletedJobs(){
        $completedJobs = [];
        foreach ($this->joborders as $joborder) {
            array_push($completedJobs, $joborder->job);
        }
        return $completedJobs;
    }

    public function hasOrdered($jobId){
        foreach ($this->joborders as $jobOrder) {
            if($jobOrder->job_id == $jobId) return true; 
        }
        return false;
    }

    public function activeJobs(){
        return Job::active();
    }



}