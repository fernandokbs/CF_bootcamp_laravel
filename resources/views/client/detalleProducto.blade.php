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

                            <div class="text-2xl font-semibold mb-8">

                                @if ($product->discount > 0)
                                    <span
                                        class="text-lg font-bold text-primary">${{ number_format($product->price * ((100 - $product->discount) / 100), 0, ',', '.') }}</span>
                                    <span
                                        class="text-sm line-through ml-2">${{ number_format($product->price, 0, ',', '.') }}</span>
                                @else
                                    <span
                                        class="text-lg font-bold text-primary">${{ number_format($product->price, 0, ',', '.') }}</span>
                                @endif
                            </div>

                            @if ($product->stock > 0)
                                <td class="px-1 py-4 text-center">
                                    <div class="flex items-center justify-center">

                                        @if ($row = Cart::content()->firstWhere('id', $product->id))
                                            <form action="{{ route('cart.update', $row->rowId) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ $row->qty - 1 }}">
                                                <button type="submit"
                                                    class="cart-decrement border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-10 h-10 flex items-center justify-center">-</button>
                                            </form>
                                            <p class="quantity text-center w-8">{{ $row->qty }}</p>

                                            <form action="{{ route('cart.update', $row->rowId) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ $row->qty + 1 }}">
                                                <button type="submit"
                                                    class="cart-increment border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-10 h-10 flex items-center justify-center">+</button>
                                            </form>
                                        @else
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                @if ($product->discount > 0)
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->price * ((100 - $product->discount) / 100) }}">
                                                @else
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                @endif

                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('storage/' . $product->image) }}">
                                                <button type="submit"
                                                    class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Add
                                                    to Cart</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
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
