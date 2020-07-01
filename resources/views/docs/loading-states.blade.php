
Because Livewire makes a roundtrip to the server every time an action is triggered on the page, there are cases when the page may not react immediately to a user event (like a click). It is up to you to determine when you should provide the user with some kind of loading state or not.

## Toggling elements during "loading" states {#toggling-elements}

Elements with the `wire:loading` directive are only visible while waiting for actions to complete (network requests).

@component('components.code', ['lang' => 'html'])
<div>
    <button wire:click="checkout">Checkout</button>

    <div wire:loading>
        Processing Payment...
    </div>
</div>
@endcomponent

When the "Checkout" button is clicked, the "Processing Payment..." message will show. When the action is finished, the message will disappear.

Also, you can "hide" an element during a loading state with the `.remove` modifier.

@component('components.code', ['lang' => 'html'])
<div>
    <button wire:click="checkout">Checkout</button>

    <div wire:loading.remove>
        Hide Me While Loading...
    </div>
</div>
@endcomponent

## Targeting specific actions {#targeting-actions}
The method outlined above works great for simple components, however, it's common to want to only show loading indicators for specific actions.

@component('components.code', ['lang' => 'html'])
<div>
    <button wire:click="checkout">Checkout</button>
    <button wire:click="cancel">Cancel</button>

    <div wire:loading wire:target="checkout">
        Processing Payment...
    </div>
</div>
@endcomponent

Now, when the "Checkout" button is clicked, the loading indicator will load, but not when the "Cancel" button is clicked.

Also note that `wire:target` can accept multiple arguments in a comma separated format like this: `wire:target="foo, bar"`.

Besides actions, you can also target whenever a `wire:model` is synchronized.

@component('components.code', ['lang' => 'html'])
<div>
    <input wire:model="quantity">

    <div wire:loading wire:target="quantity">
        Updating quantity...
    </div>
</div>
@endcomponent

## Toggling classes {#toggling-classes}

You can add or remove classes from an element during loading states, by adding the `.class` modifier to the `wire:loading` directive.

@component('components.code', ['lang' => 'html'])
<div>
    <button wire:click="checkout" wire:loading.class="bg-gray">
        Checkout
    </button>
</div>
@endcomponent

Now, when the "Checkout" button is clicked, the background will turn gray while the network request is processing.

You can also perform the inverse and remove classes by adding the `.remove` modifier.

@component('components.code', ['lang' => 'html'])
<div>
    <button wire:click="checkout" wire:loading.class.remove="bg-blue" class="bg-blue">
        Checkout
    </button>
</div>
@endcomponent

Now the `bg-blue` class will be removed from the button while loading.

## Toggling attributes {#toggling-attributes}

Similar to classes, HTML attributes can be added or removed from elements during loading states:

@component('components.code', ['lang' => 'html'])
<div>
    <button wire:click="checkout" wire:loading.attr="disabled">
        Checkout
    </button>
</div>
@endcomponent

Now, when the "Checkout" button is clicked, the `disabled="true"` attribute will be added to the element while loading.
