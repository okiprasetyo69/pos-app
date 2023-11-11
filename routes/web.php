<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'loginPage']);

Auth::routes();
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/inventory-admin', 'App\Http\Controllers\HomeController@adminInventoryPage')->name('inventory-admin')->middleware('superAdmin');
Route::get('/sales-admin', 'App\Http\Controllers\HomeController@adminSalesPage')->name('sales-admin')->middleware('superAdmin');
Route::get('/purchases-admin', 'App\Http\Controllers\HomeController@adminPurchasesPage')->name('purchase-admin')->middleware('superAdmin');

Route::get('/purchases-manager', 'App\Http\Controllers\HomeController@managerPurchasesPage')->name('purchases-manager')->middleware('manager');
Route::get('/sales-manager', 'App\Http\Controllers\HomeController@managerSalesPage')->name('sales-manager')->middleware('manager');

Route::get('/purchases', 'App\Http\Controllers\HomeController@purchasesPage')->name('purchases')->middleware('purchase');
Route::get('/sales', 'App\Http\Controllers\HomeController@salesPage')->name('sales')->middleware('sales');

Route::get('/sell', 'App\Http\Controllers\HomeController@sellConsumerPage')->name('sell-consumer')->middleware('consumer');
Route::get('/buy', 'App\Http\Controllers\HomeController@buyConsumerPage')->name('buy-consumer')->middleware('consumer');

Route::get('/cashier', 'App\Http\Controllers\HomeController@cashierPage')->name('cashier')->middleware('cashier');
Route::get('/member', 'App\Http\Controllers\HomeController@memberPage')->name('member')->middleware('member');

// data
Route::get('/inventory', 'App\Http\Controllers\Api\InventoryApiController@dataInventory')->name('inventory-data');
Route::get('/items', 'App\Http\Controllers\HomeController@getDataItems')->name('items-data');
Route::post('/member-buy', 'App\Http\Controllers\HomeController@customerBuyItem')->name('member-buy');
Route::get('/transactions', 'App\Http\Controllers\HomeController@getItemTransactions')->name('transactions');
Route::get('/income', 'App\Http\Controllers\HomeController@getTotalIncome')->name('income');