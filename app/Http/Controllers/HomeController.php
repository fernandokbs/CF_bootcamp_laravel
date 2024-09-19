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
    return view('welcome', compact('products'));
  }
}
