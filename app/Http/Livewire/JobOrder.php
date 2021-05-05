<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JobOrder extends Component
{
    public $jobOrder;
    public $action;
    public $class;

    public function mount(){
        if($this->jobOrder->status == 'pending'){
            $this->action = 'approve';
            $this->class = 'btn-success';
        }else{
            $this->action = 'Place on Pending';
            $this->class = 'btn-warning';
        }
    }

    public function render()
    {
        return view('livewire.job-order');
    }

    public function toggleStatus(){
        if($this->jobOrder->status == 'pending'){
            $this->jobOrder->approve();
        }else{
            $this->jobOrder->pend();
        }
        $this->mount();
    }
}
