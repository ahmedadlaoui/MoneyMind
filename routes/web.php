<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/board', function () {
    return view('user_dashboard/dashboard');
});
Route::get('/admin', function () {
    return view('admin_dashboard/overview');
});
Route::get('/income', function () {
    return view('user_dashboard/salary');
});
Route::get('/expenses', function () {
    return view('user_dashboard/expenses');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/settings', function () {
    return view('profile/edit');
});
Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/settings', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category',[CategoryController::class, 'getAllcategories'])->name('category.admin');
    Route::post('/category',[CategoryController::class, 'addCategory'])->name('addcategory.admin');
    Route::put('/category',[CategoryController::class, 'Editcategory'])->name('editcategory.admin');
    Route::delete('/category/{id}',[CategoryController::class, 'deleteCategory'])->name('deletecategory.admin');
});

require __DIR__.'/auth.php';
