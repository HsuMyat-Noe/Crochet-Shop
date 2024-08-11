<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard'])->middleware(['auth', 'admin']);

Route::get('admin/logout', [AdminController::class, 'admin_logout'])->middleware(['auth', 'admin']);

Route::get('admin/admin/list', [AdminController::class, 'list'])->middleware(['auth', 'admin']);
Route::get('admin/admin/add', [AdminController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('admin/admin/add', [AdminController::class, 'insert'])->middleware(['auth', 'admin']);
Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('admin/admin/edit/{id}', [AdminController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete'])->middleware(['auth', 'admin']);

Route::get('admin/category/list', [CategoryController::class, 'list'])->middleware(['auth', 'admin']);
Route::get('admin/category/add', [CategoryController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('admin/category/add', [CategoryController::class, 'insert'])->middleware(['auth', 'admin']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('admin/category/edit/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete'])->middleware(['auth', 'admin']);

Route::get('admin/subcategory/list', [SubCategoryController::class, 'list'])->middleware(['auth', 'admin']);
Route::get('admin/subcategory/add', [SubCategoryController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('admin/subcategory/add', [SubCategoryController::class, 'insert'])->middleware(['auth', 'admin']);
Route::get('admin/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('admin/subcategory/edit/{id}', [SubCategoryController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('admin/subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->middleware(['auth', 'admin']);

Route::get('admin/color/list', [ColorController::class, 'list'])->middleware(['auth', 'admin']);
Route::get('admin/color/add', [ColorController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('admin/color/add', [ColorController::class, 'insert'])->middleware(['auth', 'admin']);
Route::get('admin/color/edit/{id}', [ColorController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('admin/color/edit/{id}', [ColorController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('admin/color/delete/{id}', [ColorController::class, 'delete'])->middleware(['auth', 'admin']);

Route::get('admin/product/list', [ProductController::class, 'list'])->middleware(['auth', 'admin']);
Route::get('admin/product/add', [ProductController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('admin/product/add', [ProductController::class, 'insert'])->middleware(['auth', 'admin']);
Route::get('admin/product/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('admin/product/edit/{id}', [ProductController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('admin/product/delete/{id}', [ProductController::class, 'delete'])->middleware(['auth', 'admin']);

Route::post('admin/get-subcategories', [SubCategoryController::class, 'getSubcategories']);