<!-- Latest product section -->
@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif

<section id="latest-products" class="py-10">
    <div class="container mx-auto px-4">
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
                            <span class="text-lg font-bold text-primary">${{ $product->price }}</span>
                            <span class="text-sm line-through ml-2">${{ $product->price }}</span>
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
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="image" value="{{ asset('storage/' . $product->image) }}">
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
