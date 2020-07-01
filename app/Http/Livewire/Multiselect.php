<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Multiselect extends Component
{
    public $data;
    public function mount($users){
        $this->data = $users->map(function ($user) {
            return ['value' => $user->id, 'name' => $user->name, 'selected'=> false];
        })->toArray();
    }
    public function remove($index){
        $this->data[$index]['selected'] = false;
    }
    public function getOption($index){
        return $this->data;
    }
    public function add($index)
    {
        if($this->data[$index]['selected'] == true){
            return;
        }
        $this->data[$index]['selected'] = true;
    }

    public function getSelectedProperty(){
        return array_filter($this->data,function($option){
            return $option['selected'] == true;
        });
    }

    public function render()
    {
        return view('livewire.multiselect');
    }
}
