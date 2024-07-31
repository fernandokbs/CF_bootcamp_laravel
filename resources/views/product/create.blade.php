<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Productos') }}
        </h2>
    </x-slot>
    
    <div class="mx-5">
        <div class="py-6">
            <div class="">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-6">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                            </div>
                            <div class="col-6">
                                <x-input-label for="brand" :value="__('Brand')" />
                                <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
                            </div>

                            <div class="grid grid-cols-1">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
                            </div>
                            <div>

                            </div>
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" required autofocus autocomplete="description" />
                            </div>

                            <div>
                                <x-input-label for="stock" :value="__('Stock')" />
                                <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" required autofocus autocomplete="description" />
                            </div>

                            <div>
                                <x-input-label class="" for="visible" :value="__('Visible')" />
                                <select id="visible" name="visible" class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Elige un estado</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" name="image" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4 py-3">
                            <x-primary-button>{{ __('Guardar Producto') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
