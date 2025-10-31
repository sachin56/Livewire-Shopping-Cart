<?php

use App\Livewire\ProductShoppingCart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shopping-cart', ProductShoppingCart::class);
