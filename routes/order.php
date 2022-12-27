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

Route::group(
    [
    'prefix'     => 'order',
    'middleware'  => 'auth'
    ], function () {

        Route::get('', [App\Http\Controllers\Order\Ventas\IndexController::class, 'index'])
            ->name('order.index')
            ->middleware('permission:order.index');

        Route::get('get', [App\Http\Controllers\Order\Ventas\IndexController::class, 'get'])
            ->name('order.getPaginate')
            ->middleware('permission:order.getPaginate');

        Route::post('status', [App\Http\Controllers\Order\Ventas\CreateController::class, 'create'])
            ->name('order.create')
            ->middleware('permission:order.create');
    }
);

