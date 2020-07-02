<div class="my-4">
    <form wire:submit.prevent="add">
        <label for="name">
            Name :
        </label>
        <input type="text" wire:model="name" id="name" class="px-4 py-2 border-gray-600 border rounded appearance-none focus:outline-none bg-gray-200 ">
        <label for="active">Active:</label>
        <input id="active" type="checkbox" wire:model="active">
        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded">Add</button>
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
