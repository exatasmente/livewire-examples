
<h2 class="text-3xl font-semibold">Add Field</h2>
@if(request('options'))
    <h2 class="text-2xl font-semibold"> Form Data </h2>
    <div>
        <ul>
            @foreach(request('options') as $option)

                <li class="border rounded px-4 py-2 m-2">
                    <dl>

                        <dt>Name :</dt>
                        <dd>{{$option['name']}}</dd>
                        <dt>Active :</dt>
                        <dd>{{$option['active']}}</dd>
                    </dl>
                </li>
            @endforeach
        </ul>
    </div>
@endif
@livewire('add-field',['fields' => request('options')])

@component('components.code-component', ['className' => 'App\Http\Livewire\AddField.php', 'viewName' => 'resources/views/livewire/add-field.blade.php']) @slot('class') @verbatim
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

@endverbatim
@endslot
@slot('view') @verbatim
    <div class="my-4">
        <form wire:submit.prevent="add">
            <input type="text" wire:model="name" class="px-4 py-2 border-gray-600 border rounded appearance-none focus:outline-none bg-gray-200 ">
            <label for="active">Active:</label>
            <input id="active" type="checkbox" wire:model="active">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Add</button>
        </form>
        <form >
            <ul>
                @foreach($fields as $field)
                    <li class="flex">
                        <livewire:option-component :index="$field['id']" :name="$field['name']" :active="$field['active']" :key="$field['id']">
                            <button wire:click="remove({{$field['id']}})" type="button" class="px-4 py-2 text-red-500 mx-2 hover:border-red-500 rounded border">Remove</button>
                    </li>
                @endforeach
            </ul>
            <input type="submit" value="Save" class="px-4 py-2 bg-blue-500 text-white rounded">
        </form>
    </div>
@endverbatim
@endslot
@endcomponent
<h2 class="text-3xl font-semibold">Option Component</h2>
@component('components.code-component', ['className' => 'App\Http\Livewire\OptionsComponent.php', 'viewName' => 'resources/views/livewire/option-component.blade.php']) @slot('class') @verbatim
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

@endverbatim
@endslot
@slot('view') @verbatim
<div>
    <label for="options[{{$index}}][name]">
        Name :
    </label>
    <input type="text" wire:model="name" name="options[{{$index}}][name]" id="options[{{$index}}][name]" class="px-4 py-2 border-gray-600 border rounded appearance-none focus:outline-none bg-gray-200 ">
    <label for="options[{{$index}}][active]">
        Active :
    </label>
    <input type="checkbox" wire:input="updateActive" @if($active == true)  checked @endif id="options[{{$index}}][active]">
    <input type="hidden" value="{{$active}}" name="options[{{$index}}][active]">
</div>
@endverbatim
@endslot
@endcomponent
@component('components.code-component', ['viewName' => 'resources/views/add-field.blade.php']) @slot('view') @verbatim
...
@livewire('add-field',['fields' => request('options')])
...
@endverbatim
@endslot
@endcomponent

