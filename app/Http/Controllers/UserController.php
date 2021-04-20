<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $jobs = Auth::user()->activeJobs();
        return view('user.dashboard', ['jobs'=> $jobs]);
    }

    public function profile(){
        return view('user.profile');
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        if($request->personalinformation){
            $user->name = $request->fullname;
            $user->phone = $request->phone;
            $user->dateofbirth = $request->dateofbirth;
            $user->address = $request->address;
            $user->state = $request->state;
            $user->sex = $request->sex;
            $user->save();

            return 'success';
        }

        if($request->bankdetails){
            $user->bankname = $request->bankname;
            $user->accountname = $request->accountname;
            $user->accountnumber = $request->accountnumber;
            $user->sortcode = $request->sortcode;
            $user->save();

            return 'success';
        }

        if($request->image){
            $image = $request->image;
            list($type, $image) = explode(';',$image);
            list(, $image) = explode(',',$image);
            $image = base64_decode($image);
            $image_name = Auth::user()->user_id.'.png';
            Storage::put('profilepicture/'.$image_name, $image);
            return 'success';

        }
    }

    public function viewJob($jobId){
        $job = Job::findOrFail($jobId);
        return view('user.job', ['job' => $job]);
    }

    public function jobs(){
        $jobs = Auth::user()->activeJobs();
        return view('user.jobs', ['jobs' => $jobs]);
    }

    public function createJobOrder(Request $request){
        $job = Job::findOrFail($request->id);
        return $job->createOrder($request);
    }

    public function completedJobs(){
            $jobs = Auth::user()->getCompletedJobs();
            return view('user.completedjobs', ['jobs' => $jobs]);
    }

}