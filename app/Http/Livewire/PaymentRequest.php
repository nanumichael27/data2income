<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentRequest extends Component
{
    public $request;
    public $action;
    public $class;

    public function mount(){
        if($this->request->status == 'pending'){
            $this->action = 'approve';
            $this->class = 'btn-success';
        }else{
            $this->action = 'Place on Pending';
            $this->class = 'btn-warning';
        }
        $this->request->refresh();
    }

    public function render()
    {
        return view('livewire.payment-request');
    }

    public function toggleStatus(){
        if($this->request->status == 'pending'){
            $this->request->status = 'approved';

        }else{
            $this->request->status = 'pending';
        }
        $this->request->save();
        $this->mount();
    }
}
