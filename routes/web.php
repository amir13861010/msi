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
Route::get('/add-ticket', \App\Livewire\User\AddTicket::class)->name("UserAddTicket");
Route::get('/my-ticket', \App\Livewire\User\MyTicket::class)->name("UserMyTicket");
Route::get('/my-account', \App\Livewire\User\MyAccount::class)->name("UserMyAccount");
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
    Route::get('/admin-users', \App\Livewire\Admin\Users::class)->name("AdminUsers");
    Route::get('/admin-agents', \App\Livewire\Admin\Agents::class)->name("AdminAgents");
    Route::get('/admin-tickets', \App\Livewire\Admin\Tickets::class)->name("AdminTickets");
    Route::get('/admin-unverified-agents', \App\Livewire\Admin\UnverifiedAgents::class)->name("AdminUnverifiedAgents");
    Route::get('/admin-sells-agents', \App\Livewire\Admin\SellList::class)->name("AdminSellsAgents");
    Route::get('/admin-buys-agents', \App\Livewire\Admin\BuyList::class)->name("AdminBuysAgents");

});
Route::middleware("can:agent-panel")->group(function () {

    Route::get('/agent-panel', \App\Livewire\Agent\Dashboard::class)->name("AgentPanel");
    Route::get('/sell-order', \App\Livewire\Agent\SellOrders::class)->name('SellOrder');
    Route::get('/buy-order', \App\Livewire\Agent\BuyOrders::class)->name('BuyOrder');
    Route::get('/buy-list', \App\Livewire\Agent\BuyList::class)->name('BuyList');
    Route::get('/sell-list', \App\Livewire\Agent\SellList::class)->name('SellList');
    Route::get('/agent-account', \App\Livewire\Agent\EditAccount::class)->name('AgentAccount');
    Route::get('/agent-tickets', \App\Livewire\Agent\MyTicket::class)->name('AgentTickets');
    Route::get('/agent-add-ticket', \App\Livewire\Agent\SendTicket::class)->name('AgentSendTickets');

});
Route::get('/register', \App\Livewire\Index\Register::class)->name("register");
Route::get('/register-agent', \App\Livewire\Index\AgentRegister\IndexAgentRegister::class)->name("registerAgent");
Route::get('/login', \App\Livewire\Index\Login::class)->name("login");


