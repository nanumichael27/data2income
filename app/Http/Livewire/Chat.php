<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $user;
    public $chatId;
    public $message = '';
    public $messages = [];

    protected $listeners = ['updateUser'];

    public function mount()
    {
        $oldConversation = Conversation::where('first_user', Auth::user()->id)
            ->where('second_user', $this->user->id)
            ->orWhere('first_user', $this->user->id)
            ->where('second_user', Auth::user()->id)
            ->get()->first();
            if($oldConversation){
                $this->messages=$oldConversation->messages;
            }
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function sendMessage()
    {
        $message = new Message();
        $message->message = $this->message;
        $message->from_user = Auth::user()->id;
        $message->to_user = $this->user->id;

        $oldConversation = Conversation::where('first_user', Auth::user()->id)
            ->where('second_user', $message->to_user)
            ->orWhere('first_user', $message->to_user)
            ->where('second_user', $message->from_user)
            ->get()->first();
        if ($oldConversation) {
            $oldConversation->messages()->save($message);
        }else{
            $conversation = new Conversation();
            $conversation->first_user = Auth::user()->id;
            $conversation->second_user = $message->to_user;
            $conversation->save();
            $conversation->messages()->save($message);
        }
        $this->message = '';
        $this->mount();
    }

    public function updateUser($id){
        $this->user = User::find($id);
        $this->mount();
    }


}
