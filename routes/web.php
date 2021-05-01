<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\myprofileController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('profile')->middleware(['auth'])->group(function(){
    Route::patch('/update-username/{user}', [myprofileController::class, 'changeUsername']);
    Route::patch('/update-password/{user}', [myprofileController::class, 'changePassword']);
    Route::patch('/update-email/{user}', [myprofileController::class, 'changeEmail']);
    Route::get('/', [myprofileController::class, 'index'])->name('profile');
});

Route::prefix('category')->middleware(['auth'])->group(function(){
    Route::delete('/delete/{category:id}', [categoryController::class, 'delete']);
    Route::post('/new/{user}', [categoryController::class, 'create']);
});


