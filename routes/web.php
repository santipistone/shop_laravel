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

Route::get('/', 'Home@home');

Route::get('home', 'Home@home');

Route::get('logout', 'Login@logout');

Route::post('login', 'Login@checkLogin');

Route::post('item/order', 'Order@ordina');

Route::get('item/buy', 'Order@showAll');

Route::post('item/buy', 'Order@showAll');

Route::post('item/order-info', 'Order@showOrdini2');

Route::post('home/admin/exit', 'Admin@newExit');

Route::post('/home/admin/enter', 'Admin@newEnter');

Route::post('home/reg', 'Reg@Registra');

Route::get('home/smartphone-tablet', 'Home@home');

Route::get('home/tv-elettrodomestici', 'Home@home');

Route::get('home/console-giochi', 'Home@home');

Route::get('home/music', 'Home@music');

Route::get('home/pc-workstation', 'Home@home');

Route::post('home/admin/order', 'Admin@getOrderClient');

Route::post('home/admin/item', 'Item@show_all_');

Route::post('home/admin/item/update', 'Item@formManager');

Route::post('home/item/add', 'Item@item_add_');

Route::get('home/admin/item/add', 'Item@getItemAdder');

Route::get('cont/db', 'Content@database');

Route::get('home/user', 'Utente@getPage');

Route::get('cont/item/{q}', 'Content@item_');

Route::get('orders', 'Order@showOrdini');

Route::get('cont/look/{q?}', 'Content@item');

Route::get('home/{q}', function($q) {
    return view('home')->with('page', $q);
});

Route::get('home/item/{q}', function($q) {
    return view('home')->with('page', 'item')->with('item', $q);
} );

Route::get('/home/api/service/2/{q}', 'Content@Spotify');

Route::get('/home/api/service/1/{q}', 'Content@Lastfm');
