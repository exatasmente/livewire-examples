@extends('layouts.master')
@section('content')
<div class="bg-white">
    <div style="max-width: 800px; margin: auto" class="px-12 pt-12 pb-16 text-xl">
        <h2>Multiselect</h2>

<div>
    @livewire('multiselect',['users' => App\User::all()])
@component('components.code-component', ['className' => 'App\Http\Livewire\Multiselect.php', 'viewName' => 'resources/views/livewire/multiselect.blade.php']) @slot('class') @verbatim
use Livewire\Component;

class Multiselect extends Component
{
    public $data;

    public function mount($users)
    {
        $this->data = $users->map(function ($user) {
            return ['value' => $user->id, 'name' => $user->name, 'selected'=> false];
        })->toArray();
    }
    public function remove($index)
    {
        $this->data[$index]['selected'] = false;
    }
    public function getOption($index)
    {
        return $this->data;
    }
    public function add($index)
    {
        if($this->data[$index]['selected'] == true){
        return;
        }
        $this->data[$index]['selected'] = true;
    }

    public function getSelectedProperty()
    {
        return array_filter($this->data,function($option){
            return $option['selected'] == true;
        });
    }

    public function render()
    {
        return view('livewire.multiselect');
    }
}
@endverbatim @endslot
@slot('view') @verbatim
<div x-data="{show: false}" class="w-full flex flex-col items-center h-64 mx-auto">
    <div class="inline-block relative w-full">
        <div class="flex flex-col items-center relative">
            <div x-on:click="show = true" class="w-full">
                <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                    <div class="flex flex-auto flex-wrap">
                        @foreach($this->selected as $index => $item)
                            <div
                                class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 "
                                key="{{$item['value']}}"
                            >
                                <div class="text-xs font-normal leading-none max-w-full flex-initial">
                                    {{$item['name']}}
                                </div>
                                <div class="flex flex-auto flex-row-reverse">
                                 <div wire:click="remove({{$index}})">
                                    <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                        <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if( count($this->selected) == 0)
                        <div class="flex-1">
                            <input
                                placeholder="Select a option"
                                class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                            >
                        </div>
                    @endif
                </div>
                <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                     <button type="button" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                        <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path x-show="show  === false" x-on:click="show= true" d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z" />
                            <path x-show="show  === true" x-on:click="show= false"  d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83 c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z"/>
                        </svg>
                     </button>
                </div>
            </div>
        </div>
        <div class="w-full px-4">
            <div x-show.transition.origin.top="show == true" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto"  x-on:click.away="show = false">
                <div class="flex flex-col w-full">
                    @foreach($data as $index => $option)
                        <div wire:key="{{$option['value']}}">
                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                 wire:click="{{$option['selected']   ?  "remove($index)" : "add($index)" }}" >
                                <div class="{{$option['selected'] ? 'border-l border-teal-600' : ''}}"
                                     class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6" >{{$option['name']}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endverbatim @endslot @endcomponent
@component('components.code-component', ['viewName' => 'resources/views/welcome.blade.php']) @slot('view') @verbatim
...
@livewire('multiselect',App\User::all())
...
@endverbatim @endslot @endcomponent

@endsection
