@extends('user.layout.layout')

@section('title', 'Job')

@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <!-- <img class="profile-user-img img-fluid img-circle"
           src="../../dist/img/user4-128x128.jpg"
           alt="User profile picture"> -->
                    <i class="{{$job->generateFaLogo()}}" style="font-size: 60px;"></i>
                </div>

                <h3 class="profile-username text-center">{{$job->title}}</h3>

                <p class="text-muted text-center">{{$job->category}}</p>

                <p class="text-center"><span class="badge badge-success "><b>Active</b></span></p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Job Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-university mr-1"></i> Expected earnings</strong>

                <p class="text-muted">
                    ₦{{$job->amount}}
                </p>

                <hr>

                <strong><i class="fas fa-percentage mr-1"></i> Rate</strong>

                <p class="text-muted">{{$job->timescompleted}}/{{$job->maximum}}</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Job Activity
                </h3>
            </div>
            <div class="card-body">
                <h4>Follow the Instructions below</h4>
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-description-tab" data-toggle="pill" href="#custom-content-below-description" role="tab" aria-controls="custom-content-below-description" aria-selected="true">Job Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="custom-content-below-proof-tab" data-toggle="pill" href="#custom-content-below-proof" role="tab" aria-controls="custom-content-below-proof" aria-selected="false">Job Proof</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-description" role="tabpanel" aria-labelledby="custom-content-below-description-tab">
                        <h3 class="mb-2 mt-2">What is expected from you</h3>
                        @if($job->forFollowers())
                        <p>
                            <small style="color: red;" class="mb-4">
                                (Please ensure you are logged into the social media account that you are using Note: We accept Only real {{$job->getSocialMedia()}} Accounts)
                            </small>
                        </p>
                        <p>
                            Follow and Like 2 to 3 posts on the link below.<a href="{{$job->social_profile_link}}" target="_blank">Link</a>
                        </p>
                        @else
                        <p>
                            <small style="color: red;" class="mb-4">
                                (Please ensure you are logged into the social media account that you are using Note: We accept Only real {{$job->getSocialMedia()}} Accounts)
                            </small>
                        </p>
                        <p>
                            Like the post below.<a href="{{$job->link}}" target="_blank">Link</a>
                        </p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-proof" role="tabpanel" aria-labelledby="custom-content-below-proof-tab">
                        <h3 class="mb-2 mt-2">Required Proof that the task was finished</h3>
                        <p>Username for the social media account used</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input id="username" type="text" class="form-control" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="tab-custom-content">
                    <!-- <p class="lead mb-0">Custom Content goes here</p> -->
                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-primary" onclick="$('#custom-content-below-description-tab').click();">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="$('#custom-content-below-proof-tab').removeClass('disabled');$('#custom-content-below-proof-tab').click();">Next</button>
                        <button type="button" id="submitjob" class="btn btn-success">Finish</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.card -->
</div>
</div>
@endsection


@section('js')
<script>
    Job = {
        completed: false,
        submit: function(username) {
            if (validateUserName(username)) {
                $.ajax({
                    type: 'POST',
                    url: "{{route('createjoborder')}}",
                    data: [{
                            name: 'username',
                            value: username
                        },
                        {
                            name: 'id',
                            value: "{{$job->id}}"
                        }
                    ],
                    beforeSend: function(){
                        toastr.info('Submitting Job');
                    },
                    success: function(data){
                        if (data == "success") {
                        swal("Good job!", "Job has successfully been added", "success");
                        setTimeout(() => {
                            window.location = "{{route('dashboard')}}"
                        }, 2000);
                    } else {
                        swal("Something went wrong!", data, 'info');
                    }
                    },
                    error: function(){
                        swal("Something went wrong!", 'please check your network connection', 'error');
                    },
                })
            }else{
                toastr.info('Complete the job and insert your {{$job->getSocialMedia()}} username');
            }
        }
    }

    function validateUserName(username) {
        return username !== '';
    }

    $('#submitjob').click(function() {
        let username = $('#username').val();
        if (Job.completed) {
            Job.submit(username);
        }else{
            toastr.error('complete your job first before submitting');
        }
    });

    $('#custom-content-below-proof-tab').click(function(){
        Job.completed = true;
    });
</script>
@endsection