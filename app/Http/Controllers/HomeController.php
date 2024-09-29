<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
  public function index()
  {
    return view('client.principal');
  }

  public function show($slug)
  {
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('client.detalleProducto', compact('product')); // Devuelve la vista con el cliente encontrado
  }
}
