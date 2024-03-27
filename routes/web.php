<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Livewire\Index\Home::class);
Route::middleware("can:user-panel")->group(function () {
Route::get('/panel', \App\Livewire\User\Panel::class)->name("UserPanel");
Route::get('/add-product', \App\Livewire\User\AddProduct::class)->name("UserAddProduct");
Route::get('/myproduct', \App\Livewire\User\Products::class)->name("UserProducts");
Route::get('/gift-shop', \App\Livewire\User\Gifts::class)->name("UserGifts");
Route::get('/basket', \App\Livewire\User\Basket::class)->name("UserBasket");
Route::get('/orders', \App\Livewire\User\MyOrders::class)->name("UserOrders");
});
Route::middleware("can:admin-panel")->group(function () {

    Route::get('/admin-panel', \App\Livewire\Admin\Panel::class)->name("AdminPanel");
    Route::get('/category', \App\Livewire\Admin\Category::class)->name("AdminCategory");
    Route::get('/product', \App\Livewire\Admin\Products::class)->name("AdminProduct");
    Route::get('/selled-products', \App\Livewire\Admin\SelledProducts::class)->name("AdminSelledProducts");
    Route::get('/ratings', \App\Livewire\Admin\Rating::class)->name("AdminRating");
    Route::get('/gifts', \App\Livewire\Admin\Gifts::class)->name("AdminGifts");
    Route::get('/admin-account', \App\Livewire\Admin\AdminAccount::class)->name("AdminAccount");
    Route::get('/admin-orders', \App\Livewire\Admin\AdminOrders::class)->name("AdminOrders");

});

Route::get('/register', \App\Livewire\Index\Register::class)->name("register");
Route::get('/login', \App\Livewire\Index\Login::class)->name("login");

