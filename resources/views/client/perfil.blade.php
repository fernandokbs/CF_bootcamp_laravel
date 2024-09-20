@extends('client.layouts/principal')

@section('title', 'Perfil de Usuario')

@section('content')
    @include('client.layouts.navbar')

    <!-- Register and login -->
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if (session('status'))
        <div class="bg-red-500 text-white p-4 rounded">
            {{ session('status') }}
        </div>
    @endif

    @if (session('exito_actualizado'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('exito_actualizado') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="login-page" class="bg-white py-16 mx-auto max-w-4xl">
        <div class="container">
            <div class="">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-2xl font-semibold mb-4 text-center">Perfil de Usuario</h2>

                    @if ($user->tratamiento == '')
                        <h2 class="font-bold text-xl text-gray-800">¡Bienvenido/a, {{ Session::get('name') }}</h2>
                    @else
                        <h2 class="font-bold text-xl text-gray-800">¡Bienvenido {{ $user->tratamiento }}
                            {{ Session::get('name') }} </h2>
                    @endif


                    <h3 class="text-center pb-5">Mis datos personales</h3>

                    <form class="max-w-md mx-auto" method="POST" action="{{ route('editarPerfil') }}">
                        @csrf
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tratamiento</label>
                        <select id="countries" name="tratamiento"
                            class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if ($user->tratamiento == 'Sra.')
                                <option>Sr.</option>
                                <option selected>Sra.</option>
                            @else
                                <option selected>Sr.</option>
                                <option>Sra.</option>
                            @endif


                        </select>
                        <br>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="name" id="name"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $user->name }}" />
                            <label for="name"
                                class="peer-focus:font-medium absolute text-sm text-gray-700 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                        </div>


                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="email" id="email"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="{{ $user->email }}" required />
                            <label for="email"
                                class="peer-focus:font-medium absolute text-sm text-gray-700 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección
                                de correo electrónico</label>
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="new_password" id="new_password"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="new_password"
                                class="peer-focus:font-medium absolute text-sm text-gray-700 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nueva
                                contraseña</label>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="rut" id="rut"
                                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " value="{{ $user->rut }}" required />
                                <label for="rut"
                                    class="peer-focus:font-medium absolute text-sm text-gray-700 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rut</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="telefono" id="telefono"
                                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " value="{{ $user->telefono }}" required />
                                <label for="telefono"
                                    class="peer-focus:font-medium absolute text-sm text-gray-700 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Télefono</label>
                            </div>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="direccion" id="direccion"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="{{ $user->direccion }}" required />
                            <label for="direccion"
                                class="peer-focus:font-medium absolute text-sm text-gray-700 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>



                    <p class="text-center"><a href="{{ route('cerrarSesionCliente') }}"
                            class="text-primary hover:underline d-block">Cerrar Sesion</a></p>

                </div>
            </div>
        </div>
    </section>

@endsection
