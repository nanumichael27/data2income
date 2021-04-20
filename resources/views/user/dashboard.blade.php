@extends('user.layout.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-12">
    <!-- small box -->
    <div class="small-box bg-info" >
      <div class="inner">
        <h3>₦{{Auth()->user()->balance}}</h3>

        <p>User balance</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{route('completedjobs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-md-6 col-sm-12">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{Auth()->user()->numberOfActiveJobs()}}</h3>

        <p>Available Jobs</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{route('availablejobs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-md-6 col-sm-12">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{Auth()->user()->numberOfCompletedJobs()}}</h3>

        <p>Completed Jobs</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{route('completedjobs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <!-- <div class="col-lg-3 col-6 col-sm-12">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>

        <p>Completed Jobs</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> -->
  <!-- ./col -->
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Available Jobs</h3>
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
              <th>Rate</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($jobs as $job)
            <tr>
              <td>
                <center style="font: 40px;"><i class="{{$job->generateFaLogo()}}" aria-hidden="true"></i></center>
              </td>
              <td> {{$job->title}}</td>
              <td>{{$job->category}}
              </td>
              <td>{{$job->amount}}</td>
              <td> {{$job->timescompleted}}/{{$job->maximum}}</td>
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
              <th>Rate</th>
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