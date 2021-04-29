<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
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

    public function viewUsers(){
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function viewUser($id){
        $user = User::findOrFail($id);
        return view('admin.user', ['user' => $user]);
    }
}
