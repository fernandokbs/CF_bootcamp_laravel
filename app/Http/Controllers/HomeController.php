<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
  public function index()
  {
    $products = new Product();
    $products = Product::with('categories')->orderBy('id', 'desc')->paginate(20);
    return view('welcome', compact('products'));
  }
}
