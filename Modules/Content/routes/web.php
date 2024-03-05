<?php

use Illuminate\Support\Facades\Route;
use Modules\Content\app\Http\Controllers\ContentController;
use Modules\Content\app\Http\Controllers\ContentTypeController;

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

Route::resource('content', ContentController::class)->names('content');
Route::resource('content-types', ContentTypeController::class)->names('contentType');
Route::get('you-may-like', [ContentController::class,'youMayLike'])->name('youMayLike')->middleware('auth');;
Route::put('interact/{content_id}', [ContentController::class,'interact'])->name('interact')->middleware('auth');


