<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OptionComponent extends Component
{
    public $active;
    public $name;
    public $index;

    public function mount($index,$name,$active){
        $this->name = $name;
        $this->active = $active;
        $this->index = $index;
    }

    public function updateActive(){
        $this->active = $this->active ==  true ? false : true;
    }
    public function disable(){
        $this->active = false;
    }

    public function render()
    {
        return view('livewire.option-component');
    }
}
