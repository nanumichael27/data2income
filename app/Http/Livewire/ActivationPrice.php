<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class ActivationPrice extends Component
{   
    public $amount;
    public Setting $setting;

    protected $rules = [
        'setting.activation_price' => 'float|min:10',
    ];
    
    public function mount(){
        $this->setting = Setting::find(1);
    }

    public function render()
    {
        return view('livewire.activation-price');
    }

    public function save(){
        $this->setting->save();
    }

    public function updated()
    {
        $this->save();
    }
}
