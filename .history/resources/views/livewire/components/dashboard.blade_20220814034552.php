<div class="row">
    <x-card.mini>
        <x-slot name="count">
            {{ $users->count()}}
        </x-slot>
        Users
    </x-card.mini>
    <x-card.mini>
        <x-slot name="count">
            5
        </x-slot>
        Properties
    </x-card.mini>
    <x-card.mini>
        <x-slot name="count">
            {{ $products->count()}}
        </x-slot>
        Products
    </x-card.mini>
    <x-card.mini>
        <x-slot name="count">
            {{ $bookings->count()}}
        </x-slot>
        Bookings
    </x-card.mini>

    <x-card.mini>
        <x-slot name="count">
            {{ $posts->count()}}
        </x-slot>
        Posts
    </x-card.mini>
</div>