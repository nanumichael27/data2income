@extends('user.layout.layout')

@section('title', 'referrals')

@section('content')
<div class="row">
<div class="col-md-12">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-link"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number">Referral Link</span>
                  <span class="info-box-text" id="referrallink">{{ route('register') }}?referral={{ Auth::user()->user_id }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>
            <div class="col-md-12">
                <p onclick="copyToClipboard('#referrallink')" style="padding-top: 23px;
                                                                      cursor: pointer;
                                                                      max-width: 150px;">
                  <i class="fa fa-copy" style="font-size: 40px;"></i>
                  <span>Copy Link</span>
                </p>
            </div>
</div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Referrals</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="referralsTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Username</th>
              <th>Level</th>
              <th>Earned</th>
              <th>Date Joined</th>
            </tr>
          </thead>
          <tbody>
            @foreach(Auth()->user()->listOfReferredUsers as $user)
            <tr>
              <td> {{$user->name}}</td>
              <td>{{$user->getLevel()}}
              </td>
              <td>{{$user->totalEarned()}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
                <th>Username</th>
              <th>Level</th>
              <th>Earned</th>
              <th>Date Joined</th>
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
    $('#referralsTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

  });

  
  function copyToClipboard(element){
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
      toastr.success('Link copied to clipboard');
    }
</script>
@endsection