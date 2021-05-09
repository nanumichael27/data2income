<div  class="row">
    {{-- Success is as dangerous as failure. --}}
    <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
                <span class="bg-red">{{$support->created_at->toFormattedDateString()}}</span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{$support->created_at->toTimeString()}}</span>
                    <h3 class="timeline-header"><a href="#">{{$support->title}} </a> {{$support->user->name}} ({{$support->status}})</h3>

                    <div class="timeline-body">
                        {{$support->body}}
                    </div>
                    <div class="timeline-footer">
                        <!-- <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a> -->
                    </div>
                </div>
            </div>
            <!-- END timeline item -->

            @foreach($replies as $reply)
            <!-- timeline item -->
            <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{$reply->created_at->toTimeString()}}</span>
                    <h3 class="timeline-header"><a href="#">{{$reply->user->name}}</a> </h3>

                    <div class="timeline-body">
                        {{$reply->body}}
                    </div>
                    <div class="timeline-footer">
                        <!-- <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a> -->
                    </div>
                </div>
            </div>
            <!-- END timeline item -->
            @endforeach

        </div>






    </div>
    <!-- /.col -->

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-5">
        <!-- textarea -->
        <div class="form-group">
        
            <label>Reply</label>
            <textarea class="form-control" rows="8" placeholder="Reply" wire:model='reply'></textarea>
        </div>
        <button class="btn btn-flat btn-rounded btn-primary" wire:click='sendReply' wire:loading.remove>Send</button>
        @can('isAdmin')
            @if($support->status == 'open')
            <button class="btn btn-danger btn-rounded btn-flat float-right" wire:click='closeTicket' wire:loading.remove>Close Ticket</button>
            @endif
        @endcan
    </div>

</div>