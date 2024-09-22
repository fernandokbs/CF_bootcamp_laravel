@extends('client.layouts/principal')

@section('title', 'Login de Usuario')

@section('content')
    @include('client.layouts.navbar')

    <!-- Register and login -->
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->has('password'))
        <div class="bg-red-500 text-white p-4 rounded">
            {{ $errors->first('password') }}
        </div>
    @endif

    <!-- Product info -->
    <section id="product-info">
        <div class="container mx-auto">
            <div class="py-6">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Image Section -->
                    <div class="w-full lg:w-1/2">
                        <div class="grid gap-4">
                            <!-- Big Image -->
                            <div id="main-image-container">
                                <img id="main-image"
                                    class="h-auto w-full max-w-full rounded-lg object-cover object-center md:h-[480px]"
                                    src="{{ asset('storage/' . $product->image) }}" alt="Main Product Image" />
                            </div>
                            <!-- Small Images -->
                            <div class="grid grid-cols-5 gap-4">
                                <div>
                                    <img onclick="changeImage(this)" data-full="{{ asset('storage/' . $product->image) }}"
                                        src="{{ asset('storage/' . $product->image) }}"
                                        class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                        alt="Gallery Image 1" />
                                </div>
                                <div>
                                    <img onclick="changeImage(this)" data-full="{{ asset('storage/' . $product->image) }}"
                                        src="{{ asset('storage/' . $product->image) }}"
                                        class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                        alt="Gallery Image 2" />
                                </div>
                                <div>
                                    <img onclick="changeImage(this)" data-full="{{ asset('storage/' . $product->image) }}"
                                        src="{{ asset('storage/' . $product->image) }}"
                                        class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                        alt="Gallery Image 3" />
                                </div>
                                <div>
                                    <img onclick="changeImage(this)" data-full="{{ asset('storage/' . $product->image) }}"
                                        src="{{ asset('storage/' . $product->image) }}"
                                        class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                        alt="Gallery Image 4" />
                                </div>
                                <div>
                                    <img onclick="changeImage(this)" data-full="{{ asset('storage/' . $product->image) }}"
                                        src="{{ asset('storage/' . $product->image) }}"
                                        class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                        alt="Gallery Image 5" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Details Section -->
                    <div class="w-full lg:w-1/2 flex flex-col justify-between">
                        <div class="pb-8 border-b border-gray-line">
                            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                            <div class="mb-4 pb-4 border-b border-gray-line">
                                <p class="mb-2">Marca:<strong><a href="#" class="hover:text-primary">
                                            {{ $product->brand }}</a></strong>
                                </p>
                                <p class="mb-2">Código Producto:<strong> AA{{ $product->id }}</strong></p>
                                @if ($product->stock > 0)
                                    <p class="mb-2">Estado:<strong> Disponible</strong></p>
                                @else
                                    <p class="mb-2">Estado:<strong> No Disponible</strong></p>
                                @endif

                            </div>

                            <div class="text-2xl font-semibold mb-8">${{ $product->price }}</div>
                            @if ($product->stock > 0)
                                <div class="flex items-center mb-8">
                                    <button id="decrease"
                                        class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold w-10 h-10 rounded-full flex items-center justify-center focus:outline-none"
                                        disabled>-</button>
                                    <input id="quantity" type="number" value="1"
                                        class="w-16 py-2 text-center focus:outline-none" readonly>
                                    <button id="increase"
                                        class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold  w-10 h-10 rounded-full focus:outline-none">+</button>
                                </div>

                                <button
                                    class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Add
                                    to Cart</button>
                            @endif
                        </div>
                        <!-- Social sharing -->
                        <div class="flex space-x-4 my-6">
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('build/images/social_icons/facebook.svg') }}" alt="Facebook"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('build/images/social_icons/instagram.svg') }}" alt="Instagram"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('build/images/social_icons/pinterest.svg') }}" alt="Pinterest"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('build/images/social_icons/twitter.svg') }}" alt="Twitter"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('build/images/social_icons/viber.svg') }}" alt="Viber"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                        </div>
                        <!-- Additional Information -->
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Descripción del producto</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
