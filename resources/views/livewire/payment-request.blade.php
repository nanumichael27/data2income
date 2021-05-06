<div>
    <div class="card card-primary card-outline">
    <div wire:loading.flex wire:loading.class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

        <div class="card-body box-profile">
            <h3 class="profile-username text-center">Account Balance</h3>
            <h3 class="profile-username text-center">₦{{$request->user->balance}}</h3>

            <!-- <p class="text-muted text-center"></p> -->

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <strong>User's name</strong>
                    <b></b> <a class="float-right">{{$request->user->name}}</a>
                </li>
                <li class="list-group-item">
                    <strong>Requested Amount</strong>
                    <b></b> <a class="float-right">{{$request->amount}}</a>
                </li>
                <li class="list-group-item">
                    <strong>Status</strong>
                    <b></b> <a class="float-right">{{$request->status}}</a>
                </li>
                <li class="list-group-item">
                    <strong>Account Name</strong>
                    <b></b> <a class="float-right">{{$request->user->accountname}}</a>
                </li>
                <li class="list-group-item">
                    <strong>Bank</strong>
                    <b></b> <a class="float-right">{{$request->user->bankname}}</a>
                </li>
                <li class="list-group-item">
                    <strong>
                        Account Number:</strong>
                    <b></b> <a class="float-right">{{$request->user->accountnumber}}</a>
                </li>
                <li class="list-group-item">
                    <strong>Sort Code</strong>
                    <b></b> <a class="float-right">{{$request->user->sortcode}}</a>
                </li>
            </ul>
            <button class="btn {{$class}} btn-rounded" wire:click='toggleStatus'><b>{{$action}}</b></button>
            <a href="{{route('viewuser', $request->user->id)}}" class="float-right btn btn-primary btn-rounded">View User</a>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>