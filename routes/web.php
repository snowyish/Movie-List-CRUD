<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;


Route::get('/', [MovieController::class, 'index'])->name('movies.home'); // Home/Search Page
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show'); // Movie Details Page
Route::get('/admin', [MovieController::class, 'admin'])->name('movies.admin'); // Admin Page

Route::post('/movies', [MovieController::class, 'store'])->name('movies.store'); // Add Movie
Route::get('/movies/edit/{id}', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/update/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');







