<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//the method to register the middlware
//call the middlware function
// Route::get('/', function () {
//     return view('welcome');
// })->middleware('is_admin');
Route::get('/userpage', function () {
    return view('userpage');
})->middleware('is_admin:admin');
//before the actual action we need to assign role to the user by the middleware to what should it perform

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
