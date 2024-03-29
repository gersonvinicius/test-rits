<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::get('/clients', 'ClientController@index')->name('clients.index');
    Route::resource('/products', 'ProductController');
    Route::get('/orders', 'OrderController@index')->name('orders.index');
});

require __DIR__.'/auth.php';
