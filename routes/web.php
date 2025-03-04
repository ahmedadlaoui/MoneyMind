<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\WishController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/board', function () {
    return view('user_dashboard/dashboard');
})->name('board');

Route::get('/admin', function () {
    return view('admin_dashboard/overview');
})->name('admin');
Route::get('/income', function () {
    return view('user_dashboard/salary');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/settings', function () {
    return view('profile/edit');
});
Route::middleware('auth')->group(function () {
    Route::get('/expenses', [DepenseController::class, 'getUserExpenses'])->name('expenses.showcategories');
    Route::post('/expenses', [DepenseController::class, 'addExpense'])->name('expenses.add');

    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/settings', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', [CategoryController::class, 'getAllcategories'])->name('category.admin');
    Route::post('/category', [CategoryController::class, 'addCategory'])->name('addcategory.admin');
    Route::put('/category', [CategoryController::class, 'Editcategory'])->name('editcategory.admin');
    Route::delete('/category/{id}', [CategoryController::class, 'deleteCategory'])->name('deletecategory.admin');

    Route::get('/income', [WishController::class, 'getUserWishes'])->name('income.show');
    Route::post('/wishes', [WishController::class, 'addWish'])->name('wishes.add');
    Route::delete('/wishes/{id}', [WishController::class, 'deleteWish'])->name('wishes.delete');
});

require __DIR__ . '/auth.php';
