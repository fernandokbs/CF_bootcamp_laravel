<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pagar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'dni' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
        ]);

        $billing = Billing::create($request->only('name', 'email', 'address', 'dni', 'phone'));

        $cartContent = Cart::content();

        foreach ($cartContent as $item) {
            $billing->billingProducts()->create([
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        Cart::destroy();

        return redirect()->back()->with('success', 'Factura y productos guardados correctamente.');
    }
}
