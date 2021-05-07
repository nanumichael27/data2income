<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Conversation extends Component
{
    public $conversation;
    public $otherUser;

    public function mount(){
        if($this->conversation->firstUser->id == Auth::user()->id){
            $this->otherUser = User::find($this->conversation->secondUser->id);
        }else{
            $this->otherUser = User::find($this->conversation->firstUser->id);
        }
    }

    public function click(){
        $this->emitTo('chat', 'updateUser', $this->otherUser);
        $this->dispatchBrowserEvent('showChat');
    }

    public function render()
    {
        return view('livewire.conversation');
    }
}
