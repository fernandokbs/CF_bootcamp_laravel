<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
  public function index()
  {
    $products = new Product();

    $products = Cache::remember('products_page_' . request()->input('page', 1), 60 * 60, function () {
      return Product::with('categories')->orderBy('id', 'desc')->paginate(20);
    });
    return view('client.principal', compact('products'));
  }

  public function show($slug)
  {
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('client.detalleProducto', compact('product')); // Devuelve la vista con el cliente encontrado
  }
}
