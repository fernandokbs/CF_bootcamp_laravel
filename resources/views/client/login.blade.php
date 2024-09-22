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

    @if (session('status'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('status') }}
        </div>
    @endif

    <section id="login-page" class="bg-white py-16 mx-auto max-w-4xl">
        <div class="container">
            <div class="">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-2xl font-semibold mb-4 text-center">Iniciar sesión con su cuenta</h2>
                    <form method="POST" action="{{ route('evaluaIngresoCliente') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login-email" class="block ">Email</label>
                            <input type="email" id="login-email" name="email"
                                class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="block ">Password</label>
                            <input type="password" name="password"
                                class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>
                        <div class="flex items-center mb-3">
                            <input type="checkbox" id="remember-me" class="mr-2">
                            <label for="remember-me" class="">Remember Me</label>
                        </div>
                        <div class="mb-3">
                            <p class="text-center"><a href="#" class="text-primary hover:underline d-block">¿Olvidó su
                                    contraseña?</a></p>
                            <p class="text-center"><a href="{{ route('client.newClient') }}"
                                    class="text-primary hover:underline d-block"> ¿No tiene
                                    una cuenta? Cree
                                    una
                                    aquí</a></p>
                        </div>
                        <button type="submit"
                            class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-3 rounded-full w-full">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
