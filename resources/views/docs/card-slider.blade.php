<h2 class="text-3xl font-semibold">Card Slider</h2>
@livewire('card-slider',['users' => App\User::all()])
@component('components.code-component', ['className' => 'App\Http\Livewire\CardSlider.php', 'viewName' => 'resources/views/livewire/card-slider.blade.php']) @slot('class') @verbatim
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
@endverbatim
@endslot
@slot('view') @verbatim
<div class="bg-gray-200 rounded  shadow py-4 px-2">
    <div class=" md:flex pb-4 overflow-y-auto">
        @if(count($ids)> 0 )
            <a wire:click="prev" href="#" class="m-auto cursor-pointer">
                <svg class="h-5 w-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20" transform="rotate(180 0 0)">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        @endif
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="px-4 py-5 sm:px-6">
                <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Name
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900">
                            {{$this->user->name}}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900">
                            {{$this->user->email}}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Join at
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900">
                            {{$this->user->created_at->diffForHumans()}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        @if(count($ids)> 0 )
            <a @if($index+1 < count($ids)-1)  wire:click="next"  @endif href="#" class="m-auto cursor-pointer">
                <svg class="h-5 w-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        @endif

    </div>
    @if(count($ids)> 0 )
        <div class="flex justify-center w-full">
            @for($i =0 ; $i < count($ids) ; $i++ )
                <div @if($i != $index) wire:click="goTo({{$i}})" @endif class="{{$i == $index ? 'bg-indigo-300' : 'bg-indigo-500'}} cursor-pointer  rounded-full w-3 h-3 mx-2">
                </div>
            @endfor

        </div>
    @endif
</div>
@endverbatim
@endslot
@endcomponent
@component('components.code-component', ['viewName' => 'resources/views/card-slider.blade.php']) @slot('view') @verbatim
...
@livewire('card-slider',['users' => App\User::all()])
...
@endverbatim
@endslot
@endcomponent

