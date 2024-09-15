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
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" value="{{ old('name') }}" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="name" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" value="{{ old('email') }}" name="email" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="email" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('Contraseña')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    required autofocus autocomplete="password" />
                            </div>

                            <div>
                                <x-input-label for="password2" :value="__('Repita la Contraseña')" />
                                <x-text-input id="password2" name="password2" type="password" class="mt-1 block w-full"
                                    required autofocus autocomplete="password2" />
                            </div>

                            <x-input-label class="mt-5" for="tipo" :value="__('Tipo')" />
                            <select id="tipo" name="tipo"
                                class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="usuario" {{ old('tipo') == 'usuario' ? 'selected' : '' }}>Usuario
                                </option>
                                <option value="administrador" {{ old('tipo') == 'administrador' ? 'selected' : '' }}>
                                    Administrador</option>
                            </select>

                            <x-input-label class="mt-5" for="activo" :value="__('activo')" />
                            <select id="activo" name="activo"
                                class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>Inactivo</option>
                                <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Activo</option>
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
