<div>
    <div class="relative overflow-x-auto pt-2">
        <label for="table-search" class="sr-only">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="table-search-products"
                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar por nombre" wire:model.live.debounce.300ms="search">
        </div>


        <table class="mt-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="w-10 px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="w-30 px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="w-30 px-6 py-3">
                        slug
                    </th>
                    <th scope="col" class="w-30 px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="w-15 px-6 py-3">
                        status
                    </th>

                    <th scope="col" class="w-15 px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->slug }}
                        </td>
                        <td class="px-6 py-4">
                            @foreach ($product->categories as $category)
                                {{ $category->name }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @if ($product->visible == 1)
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Activo
                                </div>
                            @else
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Inactivo
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('product.edit', $product->id) }}" type="button"
                                data-modal-target="editUserModal" data-modal-show="editUserModal"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar Producto</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
            aria-label="Table navigation">
            {{ $products->links() }}
        </nav>
    </div>
