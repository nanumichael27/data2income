@extends('user.layout.layout')

@section('title', 'Completed Jobs')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Completed jobs</h3>
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
            @foreach(Auth()->user()->joborders as $jobOrder)
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