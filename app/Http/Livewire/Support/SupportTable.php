<?php

namespace App\Http\Livewire\Support;

use App\Models\SupportTicket;
use Livewire\Component;

class SupportTable extends Component
{
    public $supportTickets=[];

    public function mount(){
        $this->supportTickets = SupportTicket::all();
    }

    public function render()
    {
        return view('livewire.support.support-table');
    }

    public function deleteTicket($id){
        $ticket = SupportTicket::find($id);
        $ticket->forceDelete();
        $this->mount();
    }
}
