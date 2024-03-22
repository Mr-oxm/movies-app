<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Signout;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\MovieContoller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Route;

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
Route::middleware('guest')->group(function () {
    Route::name('login.')->group(function () {
        Route::get('/', [LoginController::class,'view'])->name('view');
        Route::post('/login', [LoginController::class,'authenticate'])->name('auth');
    });

    Route::name('signup.')->group(function () {
        Route::post('/signup', [SignupController::class,'register'])->name('register');
        Route::get('/signup', [SignupController::class,'view'])->name('view');
    });
});

Route::middleware('auth')->group(function () {

    Route::post('/signout', [Signout::class,'signout'])->name('signout');

    Route::name('movies.')->group(function () {
        Route::get('/movies/create', [MovieContoller::class,'create'])->name('create');
        Route::get('/movies/details/{id}', [MovieContoller::class,'details'])->name('details');
        Route::post('/movies/create', [MovieContoller::class,'create_movie'])->name('create_movie');
        Route::get('/movies', [MovieContoller::class,'index'])->name('view');
        Route::get('/movies/edit/{id}', [MovieContoller::class,'retriveMovie'])->name('view_movie');
        Route::delete('/movies/delete/{id}', [MovieContoller::class,'delete'])->name('delete');
        Route::put('/movies/edit/{id}', [MovieContoller::class,'edit_movie'])->name('edit_movie');
        //direct method
    });

});






