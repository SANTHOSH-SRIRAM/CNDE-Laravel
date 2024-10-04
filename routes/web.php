<?php

use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TabsController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [TabsController::class, 'index'])->name('tabs.index');
Route::get('/tabs/{tab}', [TabsController::class, 'showTab'])->name('tabs.show');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/menus', [AdminMenuController::class, 'showAll'])->name('menu.index');
Route::get('/menus/{menu}', [AdminMenuController::class, 'show'])->name('public.menus.show');
// Routes accessible only to authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
