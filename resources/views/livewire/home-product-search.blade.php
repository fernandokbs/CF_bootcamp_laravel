<div>

    <style>
        .flex.justify-between .relative.inline-flex.items-center {
            background-color: white !important;
            color: black !important;
            border: 1px solid #e2e8f0 !important;
        }

        .flex.justify-between .relative.inline-flex.items-center:hover {
            background-color: #f7fafc !important;
            color: #1a202c !important;
        }

        .flex.justify-between .relative.inline-flex.items-center.active {
            background-color: #4299e1 !important;
            color: white !important;
        }

        .flex.justify-between .relative.inline-flex.items-center.cursor-default {
            background-color: #e2e8f0 !important;
            color: #a0aec0 !important;
        }
    </style>


    <section id="latest-products" class="py-10">

        <div class="container mx-auto px-4">
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-products"
                    class="block my-5 pt-2 ps-10 text-sm text-white border border-gray-600 rounded-lg w-[60rem] bg-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar por nombre de producto" wire:model.live.debounce.300ms="search">



            </div>


            <h2 class="text-2xl font-bold mb-8">Ultimos Productos</h2>
            <div class="flex flex-wrap -mx-4">
                <!-- Product 1 -->
                @foreach ($products as $product)
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                        <div class="bg-white p-3 rounded-lg shadow-lg">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product 1"
                                class="w-full object-cover mb-4 rounded-lg">
                            <a href="#" class="text-lg font-semibold mb-2">{{ $product->name }}</a>
                            <p class=" my-2">{{ $product->brand }}</p>
                            <div class="flex items-center mb-4">
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
                            <div class="flex space-x-2">
                                <a href="{{ route('product.show', ['slug' => $product->slug]) }} "
                                    class="text-center bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full flex-1">
                                    Ver Producto
                                </a>
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full flex-1">
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
                                    <!-- Ruta de la imagen -->

                                    <button type="submit"
                                        class="text-center bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
                                        Agregar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="flex justify-center">
        {{ $products->links() }}
    </div>
</div>
