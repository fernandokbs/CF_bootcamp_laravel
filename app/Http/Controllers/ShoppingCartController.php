<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = Client::where('email', Session::get('email'))
            ->where('activo', 1)
            ->first();
        return view('shoppingcart.index', [
            'fullname' => $user ? $user->name : null,
            'email' => $user ? $user->email : null,
            'address' => $user ? $user->direccion : null,
            'rut' => $user ? $user->rut : null,
            'phone' => $user ? $user->telefono : null,
        ]);
    }
}
