<?php

use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::get('panel', [PanelController::class, 'index'])->name('panel');

Route::resource('products', ProductController::class);