<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MyCommerceController::class,'index'])->name('home.page');
Route::get('/product-category/{id}', [MyCommerceController::class,'category'])->name('product-category');
Route::get('/product-sub-category/{id}', [MyCommerceController::class,'subCategory'])->name('product-sub-category');
Route::get('/product-detail/{id}', [MyCommerceController::class,'detail'])->name('category.detail');

Route::post('/add-cart/{id}', [CartController::class,'index'])->name('add-to-cart');
Route::get('/cart-page', [CartController::class,'show'])->name('cart.page');
Route::get('/cart-remove/{id}', [CartController::class,'remove'])->name('remove-cart-product');
Route::post('/cart-update/{id}', [CartController::class,'update'])->name('update-cart');

Route::get('/checkout-page', [CheckoutController::class,'checkout'])->name('checkout.page');
Route::post('/new-cash-order', [CheckoutController::class,'newCashOrder'])->name('checkout.new-cash-order');
Route::get('/complete-order', [CheckoutController::class,'completeOrder'])->name('complete-order');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::post('/category/new',[CategoryController::class,'create'])->name('category.new');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/sub-category/add',[SubCategoryController::class,'index'])->name('subCategory.add');
    Route::post('/sub-category/new',[SubCategoryController::class,'create'])->name('subCategory.new');
    Route::get('/sub-category/manage',[SubCategoryController::class,'manage'])->name('subCategory.manage');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('subCategory.edit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('subCategory.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('subCategory.delete');

    Route::get('/brand/add',[BrandController::class,'index'])->name('brand.add');
    Route::post('/brand/new',[BrandController::class,'create'])->name('brand.new');
    Route::get('/brand/manage',[BrandController::class,'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

    Route::get('/unit/add',[UnitController::class,'index'])->name('unit.add');
    Route::post('/unit/new',[UnitController::class,'create'])->name('unit.new');
    Route::get('/unit/manage',[UnitController::class,'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class,'delete'])->name('unit.delete');

    Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
    Route::get('/product/get-subCategory-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('product.get-subCategory-by-category');
    Route::post('/product/new',[ProductController::class,'create'])->name('product.new');
    Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
});
