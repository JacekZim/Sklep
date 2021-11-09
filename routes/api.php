<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/category', [\App\Http\Controllers\Cat::class, 'add'])->name('category_add');
Route::delete('/category/{id}', [\App\Http\Controllers\Cat::class, 'delete'])->name('category_delete');
Route::patch('/category', [\App\Http\Controllers\Cat::class, 'change'])->name('category_change');
