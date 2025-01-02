<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Manger\MangerAuthController;
use Livewire\Livewire;
use App\Livewire\UserSearch;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Manger\MangerDashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

########################### App Manger Auth #######################
Route::group(['as' => 'manger.'], function () {
    Route::view('/manger/login','manger_dashboard.auth.login')->middleware('check.host')->name('get.login');
    Route::controller(MangerAuthController::class)->group(function () {
        Route::post('/manger/dashboard/login/','login')->name('login');
        Route::post('/manger/logout','logout')->name('logout');
    });
});

########################### Stores Auth ############################
Route::group(['as' => 'admin.'], function () {
    Route::view('/admin/login','dashboard.auth.login')->middleware('guest:web')->name('get.login');
    Route::controller(AdminAuthController::class)->group(function () {
        Route::post('/dashboard/login/','login')->name('login');
        Route::post('/admin/logout','logout')->name('logout');
    });
});

    Route::group([
        'prefix' => LaravelLocalization::setLocale() ,
        'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath']
    ],
    function () {

    ########################################## Manger Routes ##########################################
    Route::prefix('manger/dashboard')->middleware('manger')->name('manger.dashboard.')->group(function () {
        Route::get('/index', [MangerDashboardController::class,'index'])->name('index');
    });

    ########################################## Stores Routes ##########################################
    Route::prefix('store/dashboard')->middleware(['admin','tenant'])->name('dashboard.')->group(function () {
        Route::get('/index', [DashboardController::class,'index'])->name('index');
        ######################### Users ##############################
        Route::resource('/users', UserController::class)->except(['show']);
        ######################### Categories #########################
        Route::resource('/categories', CategoryController::class)->except(['show']);
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/categories/archive', 'archive')->name('categories.archive');
            Route::put('/categories/{id}/restore', 'restore')->name('categories.restore');
            Route::delete('/categories/{id}/force-delete', 'forceDelete')->name('categories.force_delete');
        });
        ######################### Products ###########################
        Route::resource('/products', ProductController::class)->except(['show']);
        Route::controller(ProductController::class)->group(function () {
            Route::get('/products/archive', 'archive')->name('products.archive');
            Route::put('/products/{id}/restore', 'restore')->name('products.restore');
            Route::delete('/products/{id}/force-delete', 'forceDelete')->name('products.force_delete');
        });
        ######################### Clients ############################
        Route::resource('/clients', ClientController::class)->except(['show']);
    });

    ######################### Livewire handel Localization #########################
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
});


