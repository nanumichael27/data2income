@extends('user.layout.layout')

@section('title', 'Payment Requests')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">Account Balance</h3>
                <h3 class="profile-username text-center">₦{{$request->user()->balance}}</h3>

                <!-- <p class="text-muted text-center"></p> -->

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <strong>Request Amount</strong>
                        <b></b> <a class="float-right">{{$request->amount}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong></strong>
                        <b></b> <a class="float-right">₦4,000</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Completed Tasks</strong>
                        <b></b> <a class="float-right">{{Auth()->user()->numberOfCompletedJobs()}}</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Minimum withdrawal amount</strong>
                        <b></b> <a class="float-right">₦1000</a>
                    </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection


@section('js')
<!-- <script>
    $(function() {
        $('#paymentRequestTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });

    });

    function submitWithdrawalRequest() {
        var amount = $('#paymentAmount').val();
        $.ajax({
            url: "{{route('requestpayment')}}",
            type: 'POST',
            data: [{
                name: 'amount',
                value: amount
            }],
            success: function(data){
                if (data == 'success') {
                    swal('successful!', 'Your request was placed',
                    'success').then(() => {
                        window.location = "{{route('paymentrequests')}}";
                    });
                } else {
                    swal('Info!', data, 'info');
                }
            },
            error: () => {
                swal("Oops! Something went wrong!", 'please check your network connection', 'error');
            }
        });
    }
</script> -->
@endsection