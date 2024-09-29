<!-- Header -->
<header class="bg-gray-dark sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Left section: Logo -->
        <a href="{{ route('home.index') }}" class="flex items-center">
            <div>
                <img src="{{ asset('build/images/template-logo-nav.jpeg') }}" alt="Logo" class="h-14 w-auto mr-4">
            </div>
        </a>

        <!-- Center section: Menu -->
        <nav class="hidden lg:flex md:flex-grow justify-center">
            <ul class="flex justify-center space-x-4 text-white">
                <li><a href="{{ route('home.index') }}" class="hover:text-secondary font-semibold">Home</a></li>

                <!-- Men Dropdown -->
                <li class="relative group" x-data="{ open: false }">
                    <a href="shop.html" @mouseover="open = true" @mouseleave="open = false" href="#"
                        class="hover:text-secondary font-semibold flex items-center">
                        Gatos
                        <i :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                    </a>
                    <ul x-show="open" @mouseover="open = true" @mouseleave="open = false"
                        class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                        <li><a href="shop.html"
                                class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Gatos Item
                                1</a></li>
                        <li><a href="shop.html"
                                class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Gatos Item
                                2</a></li>
                        <li><a href="shop.html"
                                class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Gatos Item
                                3</a></li>
                    </ul>
                </li>

                <!-- Perros Dropdown -->
                <li class="relative group" x-data="{ open: false }">
                    <a href="shop.html" @mouseover="open = true" @mouseleave="open = false" href="#"
                        class="hover:text-secondary font-semibold flex items-center">
                        Perros
                        <i :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                    </a>
                    <ul x-show="open" @mouseover="open = true" @mouseleave="open = false"
                        class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                        <li><a href="shop.html"
                                class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Perros
                                Item 1</a></li>
                        <li><a href="shop.html"
                                class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Perros
                                Item 2</a></li>
                        <li><a href="shop.html"
                                class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Perros
                                Item 3</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('checkout') }}" class="hover:text-secondary font-semibold">Checkout</a></li>
            </ul>
        </nav>

        <!-- Right section: Buttons (for desktop) -->
        <div class="hidden lg:flex items-center space-x-4 relative">
            @if (Session::has('email'))
                <a href="{{ route('verPerfil') }}"
                    class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Ver
                    Perfil</a>
            @else
                <a href="{{ route('ingreso.index') }}"
                    class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Ingresar</a>
            @endif


            <a href="{{ route('login') }}"
                class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Administrar</a>
            <div class="relative group cart-wrapper">
                <a href="{{ route('verCarrrito') }}">
                    <div class="flex items-center">

                        <p
                            class="cart-decrement border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-20 h-11 flex items-center justify-center">
                            <img src="{{ asset('build/images/cart-shopping.svg') }}" alt="Cart"
                                class="w-6 h-6 mr-2">
                            {{ Cart::count() }}
                        </p>
                    </div>
                </a>

                <!-- Cart dropdown -->
                <div class="absolute right-0 mt-1 w-80 bg-white shadow-lg p-4 rounded hidden group-hover:block">
                    <div class="space-y-4">

                        <!-- product item -->
                        @foreach (Cart::content() as $row)
                            <div class="flex items-center justify-between pb-4 border-b border-gray-line">
                                <div class="flex items-center">
                                    <img src="{{ $row->options->image }}" alt="Product"
                                        class="h-12 w-12 object-cover rounded mr-2">
                                    <div>
                                        <p class="font-semibold">{{ $row->name }}</p>
                                        <p class="text-sm">{{ $row->qty }}</p>
                                    </div>
                                </div>
                                <p class="font-semibold">{{ number_format($row->total, 0, ',', '.') }}</p>
                            </div>
                        @endforeach

                    </div>
                    <a href="{{ route('verCarrrito') }}"
                        class="block text-center mt-4 border border-primary bg-primary hover:bg-transparent text-white hover:text-primary py-2 rounded-full font-semibold">Ver
                        el carrito</a>
                </div>
            </div>
            <!-- Search field -->
            <div id="search-field" class="hidden absolute top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
                <input type="text" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Search for products...">
            </div>
        </div>
    </div>
</header>
