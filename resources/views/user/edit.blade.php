<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="mx-5">
        @if (session('status'))
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (session('password'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('password') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input value="{{ $user->name }}" id="name" name="name" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="name" />
                                @error('name')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror

                            </div>

                            <div>
                                <x-input-label class="mt-5" for="email" :value="__('Email')" />
                                <x-text-input value="{{ $user->email }}" id="email" name="email" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="email" />
                                @error('email')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <x-input-label class="mt-5" for="password" :value="__('Password')" />
                                <x-text-input value="********" id="password" name="password" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="password" />
                                @error('password')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <x-input-label class="mt-5" for="password2" :value="__('Repeat password')" />
                                <x-text-input value="********" id="password2" name="password2" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="password2" />
                                @error('password2')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <x-input-label class="mt-5" for="tipo" :value="__('Tipo')" />
                            <select id="tipo" name="tipo"
                                class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                @if ($user->tipo == 'usuario')
                                    <option value="usuario" selected>Usuario</option>
                                    <option value="administrador">Administrador</option>
                                @elseif($user->tipo == 'administrador')
                                    <option value="usuario">Usuario</option>
                                    <option value="administrador" selected>Administrador</option>
                                @endif

                                @error('tipo')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                            </select>

                            <x-input-label class="mt-5" for="visible" :value="__('Activo')" />
                            <select id="activo" name="activo"
                                class="mt-2 block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="1" {{ $user->activo == 1 ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ $user->activo == 0 ? 'selected' : '' }}>No</option>

                                @error('activo')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                            </select>

                            <div class="flex items-center gap-4 py-3">
                                <x-primary-button>{{ __('Actualizar Usuario') }}</x-primary-button>
                        </form>

                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <x-danger-button
                                class="bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ __('Eliminar Usuario') }}</x-primary-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
