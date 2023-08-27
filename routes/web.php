<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

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

Route::group(['middleware' => ['auth', 'verified']], function()
{
    Route::get('/', [PageController::class, 'index'])->name('index');

    Route::group(['as' => 'cms.', 'prefix' => 'cms'], function() {
        // Route::get('/', function () {
        //     return view('cms');
        // })->name('edit');
        Route::post('/create', [PageController::class, 'create'])->name('create');
        Route::put('/update/{id}', [PageController::class, 'update'])->name('update');
        Route::get('/', [PageController::class, 'edit'])->name('edit');
    });

});

require __DIR__.'/auth.php';
