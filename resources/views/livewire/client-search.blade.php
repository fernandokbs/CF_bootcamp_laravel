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
            <input type="text" id="table-search-categories"
                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar por nombre o email" wire:model.live.debounce.300ms="search">
        </div>


        <table class="mt-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="w-10 px-6 py-3">ID</th>
                    <th class="w-10 px-6 py-3">Name</th>
                    <th class="w-10 px-6 py-3">email</th>
                    <th class="w-10 px-6 py-3">Created</th>
                    <th class="w-10 px-6 py-3">Status</th>
                    <th class="w-10 px-6 py-3">Modificar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $client->id }}</td>
                        <td class="px-6 py-4">{{ $client->name }}</td>
                        <td class="px-6 py-4">{{ $client->email }}</td>
                        <td class="px-6 py-4">{{ $client->created_at }}</td>
                        <td class="px-6 py-4">
                            @if ($client->activo == 1)
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
                            <a href={{ route('client.edit', $client->id) }} type="button"
                                data-modal-target="editcategoryModal" data-modal-show="editcategoryModal"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar
                                Cliente</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border px-4 py-2">No se encontraron usuarios.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
            aria-label="Table navigation">
            {{ $clients->links() }}
        </nav>
    </div>
