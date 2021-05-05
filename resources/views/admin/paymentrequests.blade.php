@extends('user.layout.layout')

@section('title', 'Payment Requests')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="paymentRequestsTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Time of request</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($paymentRequests as $request)
                        <tr>
                            <td>{{$request->user->name}}</td>
                            <td> {{$request->created_at->diffForHumans()}}</td>
                            <td>₦{{$request->amount}}</td>
                            <td>{{$request->status}}</td>
                            <td>
                                <a type="button" href="{{route('viewuser', $request->id)}}" class="btn bg-gradient-success btn-sm">View Request</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Time of request</th>
                            <th>Amount</th>
                            <th>Status</th>
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
        $('#paymentRequestsTable').DataTable({
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