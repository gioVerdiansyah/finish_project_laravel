<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\UserController as User;

Route::get('/users/{user}/edit', [User::class, 'edit'])->middleware('can:update,user');
Route::put('/users/{user}', [User::class, 'update'])->middleware('can:update,user');
Route::delete('/users/{user}', [User::class, 'destroy'])->middleware('can:delete,user');