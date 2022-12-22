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
    'prefix'     => 'category',
    'middleware'  => 'auth'
    ], function () {

        Route::get('', [App\Http\Controllers\Config\Category\IndexController::class, 'index'])
            ->name('category.index')
            ->middleware('permission:category.index');

        Route::post('create', [App\Http\Controllers\Config\Category\CreateController::class, 'create'])
            ->name('category.create')
            ->middleware('permission:category.create');

        Route::delete('delete/{id}', [App\Http\Controllers\Config\Category\DeleteController::class, 'destroy'])
            ->name('category.delete')
            ->middleware('permission:category.delete');

        Route::put('{id}', [App\Http\Controllers\Config\Category\UpdatedController::class, 'updated'])
            ->name('category.updated')
            ->middleware('permission:category.updated');

        Route::get('get', [App\Http\Controllers\Config\Category\IndexController::class, 'get'])
            ->name('category.getPaginate')
            ->middleware('permission:category.getPaginate');
    }
);

Route::group(
    [
    'prefix'     => 'subcategory',
    'middleware'  => 'auth'
    ], function () {

        Route::get('', [App\Http\Controllers\Config\SubCategory\IndexController::class, 'index'])
            ->name('subcategory.index')
            ->middleware('permission:subcategory.index');

        Route::post('create', [App\Http\Controllers\Config\SubCategory\CreateController::class, 'create'])
            ->name('subcategory.create')
            ->middleware('permission:subcategory.create');

        Route::delete('delete/{id}', [App\Http\Controllers\Config\SubCategory\DeleteController::class, 'destroy'])
            ->name('subcategory.delete')
            ->middleware('permission:subcategory.delete');

        Route::put('{id}', [App\Http\Controllers\Config\SubCategory\UpdatedController::class, 'updated'])
            ->name('subcategory.updated')
            ->middleware('permission:subcategory.updated');

        Route::get('get', [App\Http\Controllers\Config\SubCategory\IndexController::class, 'get'])
            ->name('subcategory.getPaginate')
            ->middleware('permission:subcategory.getPaginate');
    }
);

Route::group(
    [
    'prefix'     => 'coin',
    'middleware'  => 'auth'
    ], function () {

        Route::get('', [App\Http\Controllers\Config\Coin\IndexController::class, 'index'])
            ->name('coin.index')
            ->middleware('permission:coin.index');

        Route::post('create', [App\Http\Controllers\Config\Coin\CreateController::class, 'create'])
            ->name('coin.create')
            ->middleware('permission:coin.create');

        Route::delete('delete/{id}', [App\Http\Controllers\Config\Coin\DeleteController::class, 'destroy'])
            ->name('coin.delete')
            ->middleware('permission:coin.delete');

        Route::put('{id}', [App\Http\Controllers\Config\Coin\UpdatedController::class, 'updated'])
            ->name('coin.updated')
            ->middleware('permission:coin.updated');

        Route::get('get', [App\Http\Controllers\Config\Coin\IndexController::class, 'get'])
            ->name('coin.getPaginate')
            ->middleware('permission:coin.getPaginate');
    }
);

Route::group(
    [
    'prefix'     => 'product',
    'middleware'  => 'auth'
    ], function () {

        Route::get('', [App\Http\Controllers\Config\Product\IndexController::class, 'index'])
            ->name('product.index')
            ->middleware('permission:product.index');

        Route::post('create', [App\Http\Controllers\Config\Product\CreateController::class, 'create'])
            ->name('product.create')
            ->middleware('permission:product.create');

        Route::delete('delete/{id}', [App\Http\Controllers\Config\Product\DeleteController::class, 'destroy'])
            ->name('product.delete')
            ->middleware('permission:product.delete');

        Route::put('{id}', [App\Http\Controllers\Config\Product\UpdatedController::class, 'updated'])
            ->name('product.updated')
            ->middleware('permission:product.updated');

        Route::get('get', [App\Http\Controllers\Config\Product\IndexController::class, 'get'])
            ->name('product.getPaginate')
            ->middleware('permission:product.getPaginate');

        Route::post('create/char', [App\Http\Controllers\Config\Product\CreateCharController::class, 'create'])
            ->name('product.create.char')
            ->middleware('permission:product.create');

        Route::post('create/exchange', [App\Http\Controllers\Config\Product\CreateExchangeController::class, 'create'])
            ->name('product.create.char')
            ->middleware('permission:product.create');
    }
);
