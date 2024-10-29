<?php

use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\DiscoverTabController;
use App\Http\Controllers\FundedResearchController;
use App\Http\Controllers\GoogleScholarController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\StartupsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TabsController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [TabsController::class, 'index'])->name('tabs.index');
Route::get('/tabs/{tab}', [TabsController::class, 'showTab'])->name('tabs.show');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::get('/publications', [GoogleScholarController::class, 'index'])->name('publications.index');

// Route to display all startups
Route::get('/startups', [StartupsController::class, 'index'])->name('startups.index');

// Route to display a specific startup
Route::get('/startups/{id}', [StartupsController::class, 'show'])->name('startups.show');

Route::get('/research', [ResearchController::class, 'index'])->name('research.index');


Route::get('/research/{submenu_name}', [ResearchController::class, 'show'])->name('research.show');

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');


Route::get('/students/{id}', [StudentsController::class, 'show'])->name('students.show');

Route::get('/faculty', [ProfessorController::class, 'index'])->name('professor.index');


Route::get('/faculty/{id}', [ProfessorController::class, 'show'])->name('professor.show');

Route::get('/fundedresearch', [FundedResearchController::class, 'index'])->name('fundedresearch.index');


Route::get('/fundedresearch/{id}', [FundedResearchController::class, 'show'])->name('fundedresearch.show');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');


Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


// Route::get('/tabs/{tab}', [DiscoverTabController::class, 'showDiscoverTabs'])->name('tabs.show');
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

// Route for showing submenu details
Route::get('/submenus/{id}', [MenuController::class, 'showSubmenu'])->name('submenus.show');



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
