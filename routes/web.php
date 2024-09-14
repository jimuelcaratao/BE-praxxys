<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/video-player', function () {
    $photoUrl = asset('img/horus-thumnail.jpg');
    $videoUrl = asset('video/horus.mp4');

    return Inertia::render('VideoPlayer/Index', [
        'photoUrl' => $photoUrl,
        'videoUrl' => $videoUrl,
    ]);
})->middleware(['auth', 'verified'])->name('video-player.index');

Route::middleware('auth')->group(function () {
    // Profile API
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Products API
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product_id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{product_id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product_id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
});




require __DIR__.'/auth.php';
