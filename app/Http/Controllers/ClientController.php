<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->password !== $request->confirmPassword) {
            return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden.'])->withInput();
        }


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        $data['password'] = Hash::make($request->password);

        Client::create($data);
        return to_route('ingreso.index')->with('status', 'Registro Creado Correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }

    public function loginClient()
    {
        return view('client.login');
    }

    public function evaluaIngresoCliente(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = Client::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('email', $request->email);
            Session::put('name', $user->name);
            Session::put('id', $user->id);
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrecta.');
        }
    }

    public function verPerfil()
    {
        $user = Client::where('email', Session::get('email'))->first();
        return view('client.perfil', compact('user'));
    }

    public function editarPerfil(Request $request)
    {

        $client = Client::findOrFail(Session::get('id'));

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('clients')->ignore($client->id),
            ],
            'password' => 'nullable|string|min:8',
            'rut' => 'nullable|string|min:8|max:20',
            'telefono' => 'nullable|string|min:8|max:30',
            'direccion' => 'nullable|string|min:8|max:255'
        ]);

        if (!empty($request->new_password)) {
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->password = Hash::make($request->input('new_password'));
            $client->tratamiento = $request->input('tratamiento');
            $client->rut = $request->input('rut');
            $client->telefono = $request->input('telefono');
            $client->direccion = $request->input('direccion');
        } else {
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->tratamiento = $request->input('tratamiento');
            $client->rut = $request->input('rut');
            $client->telefono = $request->input('telefono');
            $client->direccion = $request->input('direccion');
        }
        $client->save();
        return to_route('verPerfil')->with('exito_actualizado', 'Usuario Actualizado Correctamente!');
    }

    public function cerrarSesionCliente()
    {
        // Eliminar la variable de sesión
        Session::forget('email');
        Session::forget('name');
        Session::forget('id');
        return redirect('/');
    }
}
