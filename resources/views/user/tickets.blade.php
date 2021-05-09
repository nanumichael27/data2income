@extends('user.layout.layout')

@section('title', 'Disputes')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a class="btn btn-primary btn-sm" onclick="$('#supportModal').modal('show')">create ticket</a>
    </div>

</div>

 @livewire('support.support-list')

<div class="modal fade" id="supportModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Ticket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="ticketForm" method="POST" action="{{route('user.createticket')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" required name="title" class="form-control" id="exampleInputEmail1" placeholder="title">
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" name="priority" required>
                                <option value="low" selected>Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" required name="body" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer sr-only">
                  <button type="submit" id="submitTicketButton" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="$('#submitTicketButton').click()" class="btn btn-primary">Submit</button>
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
            success: function(data) {
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