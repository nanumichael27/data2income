<?php

namespace App\Classes;

use App\Models\User;
use App\Models\Job;

class JobOrganizer
{
    public $user;
    public $jobs = [];
    public $levels = [];

    public function __construct(User $user = null)
    {
        $this->user = $user;
        $this->levels = config('enums.levels');
    }

    public function giveJobs(User $user = null)
    {
        if ($user == null) $user = $this->user;
        switch ($user->level) {
            case config('enums.levels.basic'):
                $jobs = Job::forUserLevel($user->level);
                return $jobs;
                break;
            case config('enums.levels.top'):
                $jobs = Job::all();
                return $jobs;
                break;
            default:
                $jobs = Job::forUserLevel($user->level);
                return $jobs;
                break;
        }
    }
}
