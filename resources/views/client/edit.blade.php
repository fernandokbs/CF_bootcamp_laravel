@livewireStyles
@livewireScripts

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>



    <div class="mx-5">

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('password'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('password') }}
            </div>
        @endif

        @if ($errors->has('email'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ $errors->first('email') }}
            </div>
        @endif

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <form action="{{ route('client.update', $client->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" value="{{ old('name', $client->name) }}"
                                    type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                            </div>

                            <div>
                                <x-input-label class="mt-3" for="email" :value="__('Email')" />
                                <x-text-input id="email" value="{{ old('email', $client->email) }}" name="email"
                                    type="text" class="mt-2 block w-full" required autofocus autocomplete="email" />
                            </div>

                            <div>
                                <x-input-label class="mt-3" for="password" :value="__('Contraseña')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    autofocus autocomplete="password" />
                            </div>

                            <div>
                                <x-input-label class="mt-3" for="confirmPassword" :value="__('Repita la Contraseña')" />
                                <x-text-input id="confirmPassword" name="confirmPassword" type="password"
                                    class="mt-1 block w-full" autofocus autocomplete="confirmPassword" />
                            </div>

                            <x-input-label class="mt-3" for="tratamiento" :value="__('Tratamiento')" />
                            <select id="tratamiento" name="tratamiento"
                                class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Sr."
                                    {{ old('tratamiento', $client->tratamiento) == 'Sr.' ? 'selected' : '' }}>Sr.
                                </option>
                                <option value="Sra."
                                    {{ old('tratamiento', $client->tratamiento) == 'Sra.' ? 'selected' : '' }}>Sra.
                                </option>
                            </select>

                            <div>
                                <x-input-label class="mt-3" for="rut" :value="__('Rut')" />
                                <x-text-input id="rut" name="rut" value="{{ old('rut', $client->rut) }}"
                                    type="text" class="mt-1 block w-full" required autofocus autocomplete="rut" />
                            </div>


                            <div>
                                <x-input-label class="mt-3" for="telefono" :value="__('Teléfono')" />
                                <x-text-input id="telefono" name="telefono"
                                    value="{{ old('telefono', $client->telefono) }}" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="telefono" />
                            </div>

                            <div>
                                <x-input-label class="mt-3" for="direccion" :value="__('Dirección')" />
                                <x-text-input id="direccion" name="direccion"
                                    value="{{ old('direccion', $client->direccion) }}" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="direccion" />
                            </div>

                            <x-input-label class="mt-3" for="activo" :value="__('Activo')" />
                            <select id="activo" name="activo"
                                class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0" {{ old('activo', $client->activo) == '0' ? 'selected' : '' }}>
                                    Inactivo</option>
                                <option value="1" {{ old('activo', $client->activo) == '1' ? 'selected' : '' }}>
                                    Activo</option>
                            </select>

                            <div class="flex items-center gap-4 py-3">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
