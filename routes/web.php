<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\ProductController;

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/contact-us',[HomeController::class,'contact'])->name('contact');
Route::get('/product/{slug}/details',[ProductController::class,'index'])->name('product_details');

Route::get('/products/{slug}',[ProductController::class,'product'])->name('product_slug');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('dashboard',[AdminHomeController::class,'index'])->name('dashboard');
    Route::get('category',[AdminCategoryController::class,'index'])->name('category');
    Route::get('category/create',[AdminCategoryController::class,'create'])->name('category.create');
    Route::post('category/store',[AdminCategoryController::class,'store'])->name('category.store');
    Route::get('category/{id}/delete',[AdminCategoryController::class,'delete'])->name('category.delete');
    Route::get('category/{id}/edit',[AdminCategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update',[AdminCategoryController::class,'update'])->name('category.update');


    // Brand
     Route::get('brand',[BrandController::class,'index'])->name('brand');
    Route::get('brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('brand/{id}/delete',[BrandController::class,'delete'])->name('brand.delete');
    Route::get('brand/{id}/edit',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('brand/update',[BrandController::class,'update'])->name('brand.update');
    // Product
    Route::get('product',[AdminProductController::class,'index'])->name('product');
    Route::get('product/create',[AdminProductController::class,'create'])->name('product.create');
    Route::post('product/store',[AdminProductController::class,'store'])->name('product.store');
    Route::get('product/{id}/delete',[AdminProductController::class,'delete'])->name('product.delete');
    Route::get('product/{id}/edit',[AdminProductController::class,'edit'])->name('product.edit');
    Route::post('product/update',[AdminProductController::class,'update'])->name('product.update');
    Route::get('/categories/{id}/subcategories', [AdminProductController::class, 'getSubcategories']);
     Route::get('/subcategories/{id}/subsubcategories', [AdminProductController::class, 'subsubcategories']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
