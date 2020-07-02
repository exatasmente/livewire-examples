<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class CardSlider extends Component
{
    public $index;
    public $ids;
    public function next(){
        if($this->index < count($this->ids)-1){
            $this->index++;
        }
    }

    public function prev(){
        if($this->index > 0){
            $this->index--;
        }
    }

    public function goTo($pos){
        $this->index = $pos;
    }
    public function getUserProperty(){
        return User::find($this->ids[$this->index]);
    }

    public function mount($users){
        $this->ids = $users->pluck('id')->toArray();
        $this->index = 0;
    }

    public function render()
    {
        return view('livewire.card-slider');
    }
}
