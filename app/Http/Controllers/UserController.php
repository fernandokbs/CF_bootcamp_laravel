<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->password !== $request->password2) {
            session()->flash('password', 'Las contraseñas no coinciden.');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'activo' => 'required|integer|in:0,1',
            'tipo' => 'required|string|in:usuario,administrador',
        ], [
            'activo.in' => 'El campo activo debe ser 0 o 1.',
            'tipo.in' => 'El tipo debe ser usuario o administrador.',
        ]);

        User::create($data);
        return to_route('user.index')->with('status', 'Registro Creado Correctamente!');
    }


    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8', // No requerido, pero mínimo 8 caracteres si se incluye
            'activo' => 'required|integer|in:0,1',
            'tipo' => 'required|string|in:usuario,administrador',
        ], [
            'activo.in' => 'El campo activo debe ser 0 o 1.',
            'tipo.in' => 'El tipo debe ser usuario o administrador.',
        ]);

        if ($request->password <> '********') {
            if ($request->password !== $request->password2) {
                session()->flash('password', 'Las contraseñas no coinciden.');
                return redirect()->back();
            }
            $user->update($request->all());
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'activo' => $request->activo,
                'tipo' => $request->tipo,
            ]);
        }
        return to_route('user.index')->with('status', 'Usuario Actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('status', 'Usuario eliminado correctamente');
    }
}
