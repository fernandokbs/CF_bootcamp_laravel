<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = Client::where('email', Session::get('email'))
            ->where('activo', 1)
            ->first();

        if (is_null($user)) {
            return redirect('ingreso');
        } else {
            return view('shoppingcart.index', [
                'fullname' => $user ? $user->name : null,
                'email' => $user ? $user->email : null,
                'address' => $user ? $user->direccion : null,
                'rut' => $user ? $user->rut : null,
                'phone' => $user ? $user->telefono : null,
            ]);
        }
    }

    public function addProductToCart(Request $request)
    {
        $productId = $request->input('id');
        $productName = $request->input('name');
        $productQuantity = $request->input('quantity');
        $productPrice = $request->input('price');
        $productImage = $request->input('image');
        $productWeight = 0;

        Cart::add($productId, $productName, $productQuantity, $productPrice, $productWeight, ['image' => $productImage]);

        return redirect()->back()->with('success', 'Producto agregado al carrito correctamente.');
    }

    public function verCarrito()
    {
        $cartItems = Cart::content();
        return view('shoppingCart.carrito', compact('cartItems'));
    }

    public function update(Request $request, $rowId)
    {
        $quantity = $request->input('quantity');
        if ($quantity < 1) {
            Cart::remove($rowId);
        } else {
            Cart::update($rowId, $quantity);
        }

        return redirect()->back()->with('success', 'Cantidad actualizada correctamente.');
    }
}
