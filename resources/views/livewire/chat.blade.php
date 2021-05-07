<div wire:poll.visible>
  <!-- DIRECT CHAT PRIMARY -->
  <div class="card card-prirary cardutline direct-chat direct-chat-primary">
    <div class="card-header">
      <h3 class="card-title">Direct Chat with {{$user->name}}</h3>

      <div class="card-tools">
        <!-- <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
          <i class="fas fa-comments"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button> -->
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


      <!-- Conversations are loaded here -->
      <div class="direct-chat-messages">

        @foreach($messages as $msg)
        @if($msg->from_user != Auth()->user()->id)
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">{{$msg->fromUser->name}}</span>
            <span class="direct-chat-timestamp float-right" >{{$msg->created_at->diffForHumans()}}</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="{{ Storage::exists('profilepicture/'.$msg->fromUser->id.'.png') ? asset('profilepicture/'.$msg->fromUser->id.'.png?'.rand())  : asset('dist/img/user.svg') }}" alt="Message User Image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            {{$msg->message}}
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
        @else
        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">{{$msg->fromUser->name}}</span>
            <span class="direct-chat-timestamp float-left" >{{$msg->created_at->diffForHumans()}}</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="{{ Storage::exists('profilepicture/'.$msg->fromUser->id.'.png') ? asset('profilepicture/'.$msg->fromUser->id.'.png?'.rand())  : asset('dist/img/user.svg') }}" alt="Message User Image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            {{$msg->message}}
          </div>
          <!-- /.direct-chat-text -->
        </div>
        @endif
        @endforeach
        <!-- /.direct-chat-msg -->
      </div>
      <!--/.direct-chat-messages-->

      <!-- Contacts are loaded here -->
      <div class="direct-chat-contacts">
        <ul class="contacts-list">
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{asset('dist/img/user1-128x128.jpg')}}">

              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  Count Dracula
                  <small class="contacts-list-date float-right">2/28/2015</small>
                </span>
                <span class="contacts-list-msg">How have you been? I was...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
        </ul>
        <!-- /.contatcts-list -->
      </div>
      <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <form action="" wire:submit.prevent method="post">
        <div class="input-group">
          <input type="text" wire:model='message' name="message" placeholder="Type Message ..." class="form-control">
          <span class="input-group-append">
            <button wire:click='sendMessage' type="submit" class="btn btn-primary">Send</button>
          </span>
        </div>
      </form>
    </div>
    <!-- /.card-footer-->
  </div>
  <!--/.direct-chat -->
</div>