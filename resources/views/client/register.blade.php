@extends('client.layouts/principal')

@section('title', 'Login de Usuario')

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

    <section id="login-page" class="bg-white py-16 mx-auto max-w-4xl">
        <div class="container">
            <div class="">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-2xl font-semibold mb-4 text-center">Crear una cuenta</h2>
                    <form method="POST" action="{{ route('storeNewClient') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login-email" class="block ">Nombre</label>
                            <input type="text" id="login-email" name="name" value="{{ old('name') }}"
                                class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="login-email" class="block ">Correo Eléctronico</label>
                            <input type="email" id="login-email" name="email" value="{{ old('email') }}"
                                class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="block ">Contraseña</label>
                            <input type="password" name="password"
                                class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="login-password" class="block ">Confirmar Contraseña</label>
                            <input type="password" name="confirmPassword"
                                class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>

                        <button type="submit"
                            class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-3 rounded-full w-full">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
