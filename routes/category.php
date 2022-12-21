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
