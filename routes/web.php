<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\BillingController;


use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthenticated;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::put('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::put('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');


    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{product}/update', [ProductController::class, 'update'])->name('product.update');

    Route::get('client', [ClientController::class, 'index'])->name('client.index');
    Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('client/{client}/update', [ClientController::class, 'update'])->name('client.update');
});


Route::get('product/{slug}', [HomeController::class, 'show'])->name('product.show');

/* Clientes */
Route::get('newClient', [ClientController::class, 'newClient'])->name('client.newClient');
Route::post('create/store', [ClientController::class, 'storeNewClient'])->name('storeNewClient');
Route::get('ingreso', [ClientController::class, 'loginClient'])->name('ingreso.index');
Route::get('cerrarSesionCliente', [ClientController::class, 'cerrarSesionCliente'])->name('cerrarSesionCliente');
Route::post('evaluaIngresoCliente', [ClientController::class, 'evaluaIngresoCliente'])->name('evaluaIngresoCliente');
Route::get('verPerfil', [ClientController::class, 'verPerfil'])->name('verPerfil')->middleware(CheckAuthenticated::class);
Route::post('editarPerfil', [ClientController::class, 'editarPerfil'])->name('editarPerfil');

Route::post('pagar', [BillingController::class, 'pagar'])->name('pagar');


/*Shoppingcart*/

Route::get('checkout', [ShoppingCartController::class, 'index'])->name('checkout');
Route::get('verCarrrito', [ShoppingCartController::class, 'verCarrito'])->name('verCarrrito');
Route::post('/cart/add', [ShoppingCartController::class, 'addProductToCart'])->name('cart.add');
Route::patch('/cart/update/{rowId}', [ShoppingCartController::class, 'update'])->name('cart.update');










require __DIR__ . '/auth.php';
