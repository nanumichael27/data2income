      <div class="card-body">
        <table id="ticketTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th>Priority</th>
              <th>Message</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($supportTickets as $ticket)
            <tr>
              <td> {{$ticket->title}}</td>
              <td>{{$ticket->priority}}
              </td>
              <td>{{$ticket->body}}</td>
              <td>{{$ticket->status}}</td>
              <td>
                <a type="button" href="{{route('user.ticket', $ticket->id)}}" class="btn bg-gradient-success btn-sm">View</a>
                <a type="button" class="btn bg-gradient-danger btn-sm" wire:click='deleteTicket({{$ticket->id}})'>Delete dispute</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
                <th>Title</th>
                <th>Priority</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>