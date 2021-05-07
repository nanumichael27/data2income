<div wire:poll>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ Storage::exists('profilepicture/'.$otherUser->id.'.png') ? asset('profilepicture/'.$otherUser->id.'.png?'.rand())  : asset('dist/img/user.svg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{$otherUser->name}}
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">{{$conversation->lastMessage()->message}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$conversation->lastMessage()->created_at->diffForHumans()}}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
    <div class="dropdown-divider"></div>
</div>
