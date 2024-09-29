@extends('client.layouts/principal')

@section('title', 'Checkout')

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

    <!-- Checkout -->
    <section id="checkout-page" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-8">Checkout</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Billing and Shipping Details -->
                <div class="md:w-2/3 bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-4">Billing Details</h2>
                    <form>
                        <div class="mb-4">
                            <label for="billing-name" class="mb-4">Nombre</label>
                            <input type="text" id="billing-name"
                                class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
                                required value="{{ $fullname }}">
                        </div>
                        <div class="mb-4">
                            <label for="billing-email" class="mb-4">Correo</label>
                            <input type="email" id="billing-email"
                                class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
                                required value="{{ $email }}">
                        </div>
                        <div class="mb-4">
                            <label for="billing-address" class="mb-4">Dirección</label>
                            <input type="text" id="billing-address"
                                class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
                                required value="{{ $address }}">
                        </div>
                        <div class="mb-4">
                            <label for="billing-city" class="mb-4">Rut/dni</label>
                            <input type="text" id="billing-city"
                                class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
                                required value="{{ $rut }}">
                        </div>

                        <div class="mb-4">
                            <label for="billing-phone" class="mb-4">Teléfono</label>
                            <input type="tel" id="billing-phone"
                                class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
                                required value="{{ $phone }}">
                        </div>
                    </form>
                </div>
                <!-- Order Summary -->
                <div class="md:w-1/3 bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

                    <div class="flex justify-between mb-4">
                        <p>Subtotal</p>
                        @php
                            $subTotal = (float) str_replace(',', '', Cart::subtotal());
                            $subTotalFormatted = number_format($subTotal, 0, ',', '.');
                        @endphp
                        <p>${{ $subTotalFormatted }}</p>
                    </div>
                    <div class="flex justify-between mb-4">
                        <p>tax</p>
                        @php
                            $taxes = (float) str_replace(',', '', Cart::tax());
                            $taxesFormatted = number_format($taxes, 0, ',', '.');
                        @endphp
                        <p>${{ $taxesFormatted }}</p>
                    </div>
                    <div class="flex justify-between mb-4">
                        <p class="font-semibold">Total</p>
                        @php
                            $total = (float) str_replace(',', '', Cart::total());
                            $totalFormatted = number_format($total, 0, ',', '.');
                        @endphp
                        <p class="font-semibold">${{ $totalFormatted }}</p>
                    </div>
                    <button
                        class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-4 rounded-full w-full">Proceed
                        to Payment</button>
                </div>
            </div>
        </div>
    </section>

@endsection
