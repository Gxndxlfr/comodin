<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;

use App\Http\Controllers\ViewController;

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
    return view('login');
});

Route::get('/register',[ViewController::class,'register']);


Route::post('/loginAttempt',[ViewController::class,'login'])->name('logearse');


Route::get('/Home',[ViewController::class,'mostrarHome']);

//Ruta para la clase User
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::post('/users/create',[UserController::class,'store'])->name('registrar');
Route::put('/users/update/{id}',[UserController::class,'update']);
Route::delete('/users/destroy/{id}',[UserController::class,'destroy']);

//Ruta para la clase role
Route::get('/roles',[RoleController::class,'index']);
Route::get('/roles/{id}',[RoleController::class,'show']);
Route::post('/roles/create',[RoleController::class,'store']);
Route::put('/roles/update/{id}',[RoleController::class,'update']);
Route::delete('/roles/destroy/{id}',[RoleController::class,'destroy']);

//Ruta para la clase Book
Route::get('/books',[BookController::class,'index']);
Route::get('/books/{id}',[BookController::class,'show']);
Route::post('/books/create',[BookController::class,'store']);
Route::put('/books/update/{id}',[BookController::class,'update']);
Route::delete('/books/destroy/{id}',[BookController::class,'destroy']);

//Ruta para la clase userBook
Route::get('/userbooks',[UserBookController::class,'index']);
Route::get('/userbooks/{id}',[UserBookController::class,'show']);
Route::post('/userbooks/create',[UserBookController::class,'store']);
Route::put('/userbooks/update/{id}',[UserBookController::class,'update']);
Route::delete('/userbooks/destroy/{id}',[UserBookController::class,'destroy']);