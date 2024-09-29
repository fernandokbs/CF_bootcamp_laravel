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

    <!-- Cart -->
    <section id="cart-page" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Carrito de compras</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-center md:text-left font-semibold">Productos</th>
                                        <th class="text-center font-semibold">Precio</th>
                                        <th class="text-center font-semibold">Cantidad</th>
                                        <th class="text-center md:text-right font-semibold">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-items">
                                    @foreach (Cart::content() as $row)
                                        <tr class="pb-4 border-b border-gray-line">
                                            <td class="px-1 py-4">
                                                <div
                                                    class="flex items-center flex-col sm:flex-row text-center sm:text-left">
                                                    <img class="h-16 w-16 md:h-24 md:w-24 sm:mr-8 mb-4 sm:mb-0"
                                                        src="{{ $row->options->image }}" alt="Product image">
                                                    <p class="text-sm md:text-base md:font-semibold">{{ $row->name }}</p>
                                                </div>
                                            </td>
                                            <td class="px-1 py-4 text-center">${{ number_format($row->price, 0, ',', '.') }}
                                            </td>
                                            <td class="px-1 py-4 text-center">
                                                <div class="flex items-center justify-center">
                                                    <!-- Botón para disminuir cantidad -->
                                                    <form action="{{ route('cart.update', $row->rowId) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ $row->qty - 1 }}">
                                                        <button type="submit"
                                                            class="cart-decrement border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-10 h-10 flex items-center justify-center">-</button>
                                                    </form>
                                                    <p class="quantity text-center w-8">{{ $row->qty }}</p>
                                                    <!-- Botón para aumentar cantidad -->
                                                    <form action="{{ route('cart.update', $row->rowId) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ $row->qty + 1 }}">
                                                        <button type="submit"
                                                            class="cart-increment border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-10 h-10 flex items-center justify-center">+</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="px-1 py-4 text-right">${{ number_format($row->total, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Resumen</h2>
                        <div class="flex justify-between mb-4">
                            <p>Subtotal</p>
                            @php
                                $subTotal = (float) str_replace(',', '', Cart::subtotal());
                                $subTotalFormatted = number_format($subTotal, 0, ',', '.');
                            @endphp
                            <p>${{ $subTotalFormatted }}</p>
                        </div>
                        <div class="flex justify-between mb-4">
                            <p>Taxes</p>
                            @php
                                $taxes = (float) str_replace(',', '', Cart::tax());
                                $taxesFormatted = number_format($taxes, 0, ',', '.');
                            @endphp
                            <p>${{ $taxesFormatted }}</p>
                        </div>

                        <div class="flex justify-between mb-2">
                            <p class="font-semibold">Total</p>
                            @php
                                $total = (float) str_replace(',', '', Cart::total());
                                $totalFormatted = number_format($total, 0, ',', '.');
                            @endphp
                            <p class="font-semibold">${{ $totalFormatted }}</p>
                        </div>
                        <a href="/checkout"
                            class="bg-primary text-white border hover:border-primary hover:bg-transparent hover:text-primary py-2 px-4 rounded-full mt-4 w-full text-center block">Proceder
                            al pago</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
