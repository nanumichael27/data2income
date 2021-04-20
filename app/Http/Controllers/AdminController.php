<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:isAdmin');
    }

    public function postJob(){
        return view('admin.postjob');
    }

    public function createJob(Request $request){
        return Job::addJob($request);
    }


}
