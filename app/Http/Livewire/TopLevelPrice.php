<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class TopLevelPrice extends Component
{
    public $amount;
    public Setting $setting;

    protected $rules = [
        'setting.top_level_price' => 'float|min:10',
    ];

    public function mount(){
        $this->setting = Setting::find(1);
    }

    public function render()
    {
        return view('livewire.top-level-price');
    }

    public function save(){
        $this->setting->save();
    }
    public function updated()
    {
        $this->save();
    }
}
