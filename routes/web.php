<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PageController::class, 'index'])->name('index');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::group(['as' => 'cms.', 'prefix' => 'cms'], function() {
        Route::post('/create', [PageController::class, 'create'])->name('create');
        Route::put('/update/{id}', [PageController::class, 'update'])->name('update');
        Route::get('/edit', [PageController::class, 'edit'])->name('edit');
    });

    Route::group(['as' => 'document.', 'prefix' => 'document'], function() {
        Route::post('/create', [DocumentController::class, 'create'])->name('create');
        Route::put('/update/{id}', [DocumentController::class, 'update'])->name('update');
        Route::get('/download/{name}', [DocumentController::class, 'download'])->name('download');
        Route::delete('/destroy/{id}', [DocumentController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
