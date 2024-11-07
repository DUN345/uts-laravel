<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
Route::middleware('auth')->group(function () {
    // Rute untuk mengelola informasi profil
    // Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/coba', [Profile::class, 'update'])->name('profil.update');
    // Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/download', [PostController::class, 'downloadPDF'])->name('posts.download');


// Resource route for posts
Route::resource('/posts', PostController::class)->middleware('auth');



require __DIR__.'/auth.php';

