<?php

namespace App\Http\Livewire\Support;

use App\Models\SupportTicket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SupportList extends Component
{
    public $tickets = [];

    public function mount(){
        $this->tickets = Auth::user()->tickets()->where('status', 'open')->get();
    }

    public function render()
    {
        return view('livewire.support.support-list');
    }

    public function deleteTicket($id){
        $ticket = SupportTicket::find($id);
        $ticket->forceDelete();
        $this->tickets = Auth::user()->tickets()->get();
        $this->mount();
    }
}