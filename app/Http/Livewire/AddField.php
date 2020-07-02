<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddField extends Component
{

    public $fields = [];
    public $name;
    public $active;
    public function mount($fields = []){
        $this->fields = collect($fields)->map(function($field,$index){
            return [
                'id' => $index,
                'name' => $field['name'],
                'active' =>$field['active']
            ];
        })->toArray();
    }
    public function add(){
        $this->fields []= [
            'id' => count($this->fields)+1,
            'name' => $this->name,
            'active' =>$this->active
        ] ;
        $this->name = '';
        $this->active = false;
    }

    public function remove($id){
        $this->fields = array_filter($this->fields, function($field) use ($id){
            return $field['id'] != $id;
        });
    }
    public function render()
    {
        return view('livewire.add-field');
    }
}
