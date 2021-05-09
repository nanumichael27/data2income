<?php

namespace App\Http\Livewire\Support;

use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Support extends Component
{
    public $support;
    public $replies;
    public $reply='';
    

    public function mount(){
        $this->reply = '';
        $this->replies = $this->support->replies()->get();
    }

    public function render()
    {
        return view('livewire.support.support');
    }

    public function sendReply(){
        $reply = new SupportMessage();
        $reply->body = $this->reply;
        $reply->user_id = Auth::user()->id;
        $this->support->replies()->save($reply);
        $this->mount();
    }

    public function closeTicket(){
        $this->support->close();
        $this->mount();
    }
}
