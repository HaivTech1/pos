<div class="row">
    <x-card.mini>
        <x-slot name="count">
            {{ $users->count()}}
        </x-slot>
        Users
    </x-card.mini>
    <x-card.mini>
        <x-slot name="count">
            {{ $products->count()}}
        </x-slot>
        Products
    </x-card.mini>
</div>