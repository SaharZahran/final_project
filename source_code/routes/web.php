<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Seller\SellerController;
// Admin Routes
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ManageSellerController;
use App\Http\Controllers\Admin\ManageProductsController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Admin\PostController;

// Seller Routes
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\FilterController;

// User Routes
use App\Http\Controllers\User\HomePageController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\Controller;
use App\Http\Controllers\User\LandingController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\SliderController;

Route::get('/', [LandingController::class, 'showLandingpage'])->name('showLandingpage');
Route::get('filtersubcategory/{id}', [HomePageController::class, 'showProducts'])->name('subcategoryFilter');
Route::post('filter-products', [HomePageController::class, 'filter'])->name('filterProducts');
Route::get('showproduct/{id}', [HomePageController::class, 'showSingleProduct'])->name('showProduct');
Route::get('store/{id}', [HomePageController::class, 'showStore'])->name('showStore');
Route::get('filter/{id}', [HomePageController::class, 'showSubCategories'])->name('categoryFilter');
Route::resource('blog', BlogController::class);
Route::resource('contact', ContactController::class);
Auth::routes();
//For Normal Users
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        
    });
    Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class , 'logout'])->name('logout');
        Route::resource('order', OrderController::class);
        Route::resource('checkout', CheckoutController::class);
        Route::resource('comments', CommentController::class);
    });
});
//For Admins 
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
        });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/users', [ManageUserController::class, 'index'])->name('users');
        Route::get('/users/delete/{id}', [ManageUserController::class, 'delete']);
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class);
        Route::resource('stores', ManageSellerController::class);
        Route::resource('products', ManageProductsController::class);
        Route::resource('orders', ManageOrderController::class);
        Route::resource('posts', PostController::class);
    });
});
//For Sellers 
Route::prefix('seller')->name('seller.')->group(function(){
       
    Route::middleware(['guest:seller','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.seller.login')->name('login');
          Route::view('/register', 'dashboard.seller.register')->name('register');
          Route::post('/create', [SellerController::class, 'create'])->name('create');
          Route::post('/check',[SellerController::class,'check'])->name('check');
    });
    Route::middleware(['auth:seller','PreventBackHistory'])->group(function(){
        Route::post('/logout',[SellerController::class,'logout'])->name('logout');
        Route::get('filter/{idValue}', [FilterController::class, 'filter'])->name('filter');
        Route::resource('shop', StoreController::class);
    });
});
