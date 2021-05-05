<div>
    <div>
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <i class="{{$jobOrder->job->generateFaLogo()}}" style="font-size: 60px;"></i>
                </div>
                <h3 class="profile-username text-center">Order placed</h3>
                <h6 class="profile-username text-center">{{$jobOrder->created_at->diffForHumans()}}</h6>

                <!-- <p class="text-muted text-center"></p> -->

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <strong>User's name</strong>
                        <b></b> <a class="float-right">{{$jobOrder->user->name}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>User's Balance</strong>
                        <b></b> <a class="float-right">₦{{$jobOrder->user->balance}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Amount earned</strong>
                        <b></b> <a class="float-right">₦{{$jobOrder->job->amount}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Status</strong>
                        <b></b> <a class="float-right">{{$jobOrder->status}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Title</strong>
                        <b></b> <a class="float-right">{{$jobOrder->job->title}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Level</strong>
                        <b></b> <a class="float-right">{{$jobOrder->job->level}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>
                            Category:</strong>
                        <b></b> <a class="float-right">{{$jobOrder->job->category}}</a>
                    </li>
                    @if($jobOrder->job->forFollowers())
                    <li class="list-group-item">
                        <strong>
                            Profile link:</strong>
                        <b></b> <a class="btn btn-primary float-right" href="{{$jobOrder->job->social_profile_link}}" target="_blank">Link</a>
                    </li>
                    @else
                    <li class="list-group-item">
                        <strong>
                            Post link:</strong>
                        <b></b> <a class="btn btn-primary float-right" href="{{$jobOrder->job->link}}" target="_blank">Link</a>
                    </li>

                    @endif
                    <li class="list-group-item">
                        <strong>{{$jobOrder->job->getSocialMedia()}} username used</strong>
                        <b></b> <a class="float-right">{{$jobOrder->username}}</a>
                    </li>
                </ul>
                <button class="btn {{$class}} btn-rounded" wire:loading.remove wire:click='toggleStatus'><b>{{$action}}</b></button>
                <a href="{{route('viewuser', $jobOrder->user->id)}}" class="float-right btn btn-primary btn-rounded">View User</a>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>