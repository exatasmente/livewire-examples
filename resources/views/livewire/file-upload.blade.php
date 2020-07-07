<form wire:submit.prevent="save">
    @if ($photo)
        Photo Preview:
        <img src="{{ $photo->temporaryUrl() }}">
    @endif
        <input type="file" wire:model="photo">
        @error('photo') <span class="error">{{ $message }}</span> @enderror

        <div wire:loading wire:target="photo">Uploading...</div>

    <button type="submit">Save Photo</button>
</form>
