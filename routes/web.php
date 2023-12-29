<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReaderController;
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

// Route::get('/dashboard', function () {
//     return view('layouts/master');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('layouts/master');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/borrowed-history', function () {
//     return view('readers/borrowed-history');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/staff/dashboard', [AdminController::class, 'index'])->name('staff.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/books/index', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/books/{id}/show', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('book.update');
    Route::delete('/books/{id}/destroy', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/books/{id}/issue', [BookController::class, 'issue'])->name('book.issue');
    Route::post('/books/{id}/borrows', [BookController::class, 'borrows'])->name('book.borrows');
    
    Route::get('/readers/index', [ReaderController::class, 'index'])->name('readers.index');
    Route::get('/readers/{id}/edit', [ReaderController::class, 'edit'])->name('reader.edit');
    Route::put('/readers/{id}/update', [ReaderController::class, 'update'])->name('reader.update');


    Route::get('/employees/index', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employees/{id}/show', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employees/{id}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');


    Route::get('/barrow-history', [BookController::class, 'history'])->name('barrow-history');
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::middleware('auth')->group(function(){
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});

require __DIR__.'/auth.php';

Route::get('/reader/dashboard', function () {
    return view('readers/dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('layouts/master');
})->name('dashboard');
