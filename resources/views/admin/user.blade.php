@extends('user.layout.layout')

@section('title', 'Users')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-5">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{ Storage::exists('profilepicture/'.$user->user_id.'.png') ? asset('profilepicture/'.$user->user_id.'.png?'.rand())  : asset('dist/img/user.svg') }}" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{$user->name}}</h3>

        <p class="text-muted text-center">{{$user->getLevel()}}</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <strong><i class="fa fa-envelope-open"></i></strong>
            <b>Email</b> <a class="float-right">{{$user->email}}</a>
          </li>
          <li class="list-group-item">
            <strong><i class="fa fa-phone"></i></strong>
            <b>Phone</b> <a class="float-right">{{$user->phone}}</a>
          </li>
          <li class="list-group-item">
            <strong><i class="fa fa-wallet"></i></strong>
            <b>Balance</b> <a class="float-right">₦{{$user->balance}}</a>
          </li>
          <li class="list-group-item">
            <strong><i class="fa fa-map-marker-alt"></i></strong>
            <b>State</b> <a class="float-right">{{$user->state}}</a>
          </li>
          <li class="list-group-item">
            <strong><i class="fa fa-address-book"></i></strong>
            <b>Address</b> <a class="float-right">{{$user->address}}</a>
          </li>
          <li class="list-group-item">
            <strong><i class="fa fa-level-up-alt"></i></strong>
            <b>Level</b> <a class="float-right">{{$user->getLevel()}}</a>
          </li>
          <!-- <li class="list-group-item">
                  <strong><i class="fa fa-university"></i></strong>
                    <b>Balance</b> <a class="float-right">{{$user->balance}}</a>
                  </li> -->
        </ul>

        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-xs-12 col-sm-12 col-md-7">
    <!-- Bank Details Me Box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Bank Details</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong><i class="fas fa-university mr-1"></i> Bank Name</strong>

        <p class="text-muted">
          {{$user->bankname}}
        </p>

        <hr>

        <strong><i class="fas fa-user-circle mr-1"></i> Account Name</strong>

        <p class="text-muted">{{$user->accountname}}</p>

        <hr>
        <strong><i class="fas fa-sort-numeric-up mr-1"></i> Account Number</strong>

        <p class="text-muted">{{$user->accountnumber}}</p>

        <hr>

        <strong><i class="fas fa-sort-numeric-up mr-1"></i> Sort Code</strong>

        <p class="text-muted">{{$user->sortcode}}</p>

        <hr>

        <!-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Completed Jobs</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="jobsTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Logo</th>
              <th>Job Category</th>
              <th>Job Title</th>
              <th>Amount(NGN)</th>
              <th>Status</th>
              <th>Rate</th>
              <th>Time Completed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user->joborders as $jobOrder)
            @php
            $job = $jobOrder->job
            @endphp
            <tr>
              <td>
                <center style="font: 40px;"><i class="{{$job->generateFaLogo()}}" aria-hidden="true"></i></center>
              </td>
              <td> {{$job->title}}</td>
              <td>{{$job->category}}
              </td>
              <td>{{$job->amount}}</td>
              <td>{{$jobOrder->status}}</td>
              <td> {{$job->timescompleted}}/{{$job->maximum}}</td>
              <td>{{$jobOrder->created_at->diffForHumans()}}</td>
              <td>
                <a type="button" href="{{route('viewjob', $job->id)}}" class="btn bg-gradient-success btn-sm">View</a>
                <a type="button" class="btn bg-gradient-danger btn-sm">Cancel</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Logo</th>
              <th>Job Category</th>
              <th>Job Title</th>
              <th>Amount(NGN)</th>
              <th>Status</th>
              <th>Rate</th>
              <th>Time Completed</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>


</div>
@endsection

@section('js')
<script>
  $(function() {
    $('#jobsTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

  });
</script>
@endsection