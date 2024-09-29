<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('id', 'name');
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data = $request->all();

        if ($request->hasFile('file')) {

            $path = $request->file('file')->store('products', 'public');
            $data['image'] = $path;
        }

        $data['slug'] = Str::slug($data['name']);
        $product = Product::create($data);

        if ($request->categories) {
            $product->categories()->attach($request->categories);
        }

        $cachePrefix = 'products_cache_' . time();
        Cache::put('products_cache_prefix', $cachePrefix);
        return to_route('product.index')->with('status', 'Producto Creado Correctamente!');
    }

    public function edit(Product $product)
    {
        $category = Category::pluck('id', 'name');
        return view('product.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $product->update($request->all());

        if ($request->categories) {
            $product->categories()->sync($request->categories);
        }

        if ($request->file('file')) {
            $image = Storage::put('products', $request->file('file'));

            if ($product->image) {
                Storage::delete($product->image);

                $product->update([
                    'image' => $image
                ]);
            } else {
                $product->create([
                    'image' => $image
                ]);
            }
        }
        $cachePrefix = 'products_cache_' . time();
        Cache::put('products_cache_prefix', $cachePrefix);
        return to_route('product.index')->with('status', 'Producto Actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
