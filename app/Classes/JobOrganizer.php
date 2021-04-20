<?php

namespace App\Classes;

use App\Models\User;

class JobOrganizer{
    public function __construct(User $user = null)
    {
        $this->user = $user;
    }

    public function giveJobs(User $user){
        
    }

}

?>