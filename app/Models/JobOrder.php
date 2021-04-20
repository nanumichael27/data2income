<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'username',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function rewardUser(){
        $this->refresh();
        if( !$this->rewarded()){
            $user = $this->user;
            $user->fundAccount($this->job->amount);
            $this->status = 'activated';
            $this->save();
            return true;
        }else{
            return 'You have already been rewarded, You can apply for other jobs';
        }
    }

    public function rewarded(){
        return $this->status == 'activated';
    }


}