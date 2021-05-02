@extends('user.layout.layout')

@section('title', 'Payment Requests')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">Account Balance</h3>
                <h3 class="profile-username text-center">₦{{Auth()->user()->balance}}</h3>

                <!-- <p class="text-muted text-center"></p> -->

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <strong>Last withdrawal</strong>
                        <b></b> <a class="float-right">25 days ago</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Last Withdrawal Amount</strong>
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

    <div class="col-sm-12 col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Payment Requests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="paymentRequestTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount(NGN)</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth()->user()->paymentRequests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->amount}}</td>
                            <td>{{$request->status}}</td>
                            <td>{{$request->created_at->diffForHumans()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Amount(NGN)</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-block btn-primary btn-flat btn-rounded" data-toggle="modal" data-target="#paymentRequestModal">Click here to create a payment request.</button>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </div>
</div>

<div class="modal fade" id="paymentRequestModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Request Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <strong>Balance</strong>
                                <b></b> <strong class="float-right">₦{{Auth()->user()->balance}}</strong>
                            </li>
                        </ul>
                        <div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₦</span>
                                </div>
                                <input type="number" id="paymentAmount" class="form-control" min="200" value="1000" placeholder="Request Payment(₦)">
                            </div>
                            <br>
                            <div>
                                <p>please ensure that your <a href="{{route('userprofile')}}">profile</a> details is up to date before you make a withdrawal request.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitWithdrawalRequest()" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection


@section('js')
<script>
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
</script>
@endsection