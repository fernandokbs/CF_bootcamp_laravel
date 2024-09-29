<!-- Latest product section -->
@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif

@livewire('home-product-search')
