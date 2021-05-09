<div class="row mt-4">
    
{{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @foreach($tickets as $ticket)
    <div class="col-md-3">
        <div class="card card-outline card-primary">
        <div wire:loading.flex wire:loading.class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
            <div class="card-header">
                <h6 class="card-title">{{$ticket->title}}</h6>

                <div class="card-tools">
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div>
                    <p>{{$ticket->created_at->diffForHumans()}}</p>
                </div>
                <a href="{{route('user.ticket', $ticket->id)}}" class="btn btn-xs btn-success">view</a>
                <button type="button" class="float-right btn btn-xs btn-danger" wire:click='deleteTicket({{$ticket->id}})'>delete</button>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    @endforeach
</div>

