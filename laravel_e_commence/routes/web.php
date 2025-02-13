<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::redirect('/dashboard', '/home');
Route::redirect('/', '/home');
// Route::get('/home/{a}/{b}', [HomeController::class,'index'])->name('home');

Route::get('/home', [HomeController ::class,'index'])->name('home');
Route::get('/signup', [SignupController ::class,'create'])->name('signup');
Route::get('/userLogin', [LoginController ::class,'login'])->name('userLogin');
// Route::get('/car/create', [CarController ::class,'create'])->name('car.create');
// Route::get('/guest', [GuestController ::class,'index'])->name('guest');

Route::get('/cars/search', [CarController::class,'search'])->name('cars.search');
Route::resource('cars', CarController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
