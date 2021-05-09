@extends('user.layout.layout')

@section('title', 'Log')

@section('content')
<div class="row">

</div>
@livewire('support.support', ['support' => $supportTicket])
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
</script>
@endsection