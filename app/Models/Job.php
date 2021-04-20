<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'amount',
        'social_profile_link',
        'social_username',
        'link',
        'maximum',
        'amount',
        'description',
        'timescompleted',
    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'amount' => 'float',
        'maximum' => 'integer',
        'timescompleted' => 'integer',

    ];

    public function orders()
    {
        return $this->hasMany(JobOrder::class);
    }

    public static function addJob($request)
    {
        $job = new Job();
        $job->title = $request->title;

        $job->category = $request->category;

        $job->amount = $request->amount;

        $job->social_profile_link = $request->social_profile_link;

        $job->social_username = $request->social_username;

        $job->link = $request->link;

        $job->maximum = $request->quantity;

        return $job->save() ? 'success' : 'an error occured';
        // return $job->generateFaLogo();
    }

    public function generateFaLogo()
    {
        $media = $this->getSocialMedia();
        switch ($media) {
            case 'instagram':
                return 'fab fa-instagram';
                break;
            case 'tiktok':
                return 'fab fa-tiktok';
                break;
            case 'twitter':
                return 'fab fa-twitter';
                break;
            case 'youtube':
                return 'fab fa-youtube';
                break;
            default:
                return 'fab fa-instagram';
                break;
        }
    }

    public function getSocialMedia()
    {
        $category = $this->getCategoryInLowerCase();
        if (stripos($category, 'instagram') !== false) {
            return 'instagram';
        } elseif (stripos($category, 'tiktok') !== false) {
            return 'tiktok';
        } elseif (stripos($category, 'twitter') !== false) {
            return 'twitter';
        } elseif (stripos($category, 'igtv') !== false) {
            return 'instagram';
        } elseif (stripos($category, 'youtube') !== false) {
            return 'youtube';
        } else {
            return 'none';
        }
    }

    public function forFollowers()
    {
        $category = $this->getCategoryInLowerCase();
        return stripos($category, 'follow') !== false ? true : false;
    }

    public function getCategoryInLowerCase()
    {
        return strtolower($this->category);
    }

    public function createOrder($request)
    {
        if (Auth::user()->hasOrdered($request->id)) {
            return 'You have already ordered this job';
        }
        $jobOrder = new JobOrder([
            'user_id' => Auth::user()->id,
            'username' => $request->username,
        ]);
        return $this->orderJob($jobOrder);
    }

    public function orderJob($jobOrder){
        if($this->isCompleted()) return "This job has been completed";
        $this->orders()->save($jobOrder);
        $this->incrementTimesCompleted();
        return $jobOrder->rewardUser() ? 'success' : $jobOrder->rewardUser();
    }

    public function incrementTimesCompleted(){
        $this->timescompleted++;
        $this->save();
    }
    
    public function isCompleted(){
        return $this->timescompleted == $this->maximum;
    }

    public function isNotCompleted(){
        return !$this->isCompleted();
    }

    public static function active(){
        $result = [];
        $jobs = Job::all();
        foreach ($jobs as $job) {
            if($job->isNotCompleted()) array_push($result, $job);
        }
        return $result;
    }

}
