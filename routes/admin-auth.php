<?php

use App\Http\Controllers\Admin\Auth\LoginController;


use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSubmenuController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

// Route::prefix('admin')->middleware('guest:admin')->group(function () {
//     Route::get('register', [RegisteredUserController::class, 'create'])
//         ->name('admin.register');

//     Route::post('register', [RegisteredUserController::class, 'store']);

//     Route::get('login', [LoginController::class, 'create'])
//         ->name('admin.login');

//     Route::post('login', [LoginController::class, 'store']);


// });

// Route::prefix('admin')->middleware('auth:admin')->group(function () {

//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

    // Menu routes
    // Route::get('/menus', [AdminMenuController::class, 'index'])->name('menus.index');
    // Route::get('/menus/create', [AdminMenuController::class, 'create'])->name('menus.create');
    // Route::post('/menus', [AdminMenuController::class, 'store'])->name('menus.store');
    // Route::get('/menus/{menu}/edit', [AdminMenuController::class, 'edit'])->name('menus.edit');
    // Route::patch('/menus/{menu}', [AdminMenuController::class, 'update'])->name('menus.update');
    // Route::delete('/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('menus.destroy');

    // Submenu routes
    // Route::get('/submenus', [AdminSubmenuController::class, 'index'])->name('submenus.index');
    // Route::get('/submenus/create', [AdminSubmenuController::class, 'create'])->name('submenus.create');
    // Route::post('/submenus', [AdminSubmenuController::class, 'store'])->name('submenus.store');
    // Route::get('/submenus/{submenu}/edit', [AdminSubmenuController::class, 'edit'])->name('submenus.edit');
    // Route::patch('/submenus/{submenu}', [AdminSubmenuController::class, 'update'])->name('submenus.update');
    // Route::delete('/submenus/{submenu}', [AdminSubmenuController::class, 'destroy'])->name('submenus.destroy');
    
    // ourClients routes
    // Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index'); // View all clients
    // Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create'); // Show create form
    // Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store'); // Store a new client
    // Route::get('/clients/{client}', [ClientsController::class, 'show'])->name('clients.show'); // View a single client
    // Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit'); // Show edit form
    // Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update'); // Update an existing client
    // Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy'); // Delete a client

    // Route::post('logout', [LoginController::class, 'destroy'])
        // ->name('admin.logout');
// });
