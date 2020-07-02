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
