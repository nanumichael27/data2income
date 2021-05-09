@extends('user.layout.layout')

@section('title', 'Disputes')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">View Disputes</h3>
      </div>

@livewire('support.support-table')
    </div>
    <!-- /.card -->
  </div>

</div>
@endsection

@section('js')
<script>
  $(function() {
    $('#ticketTable').DataTable({
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