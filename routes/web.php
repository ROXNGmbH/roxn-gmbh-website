<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\CustomersController;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\DeliveryTimeController;
use App\Http\Controllers\admin\ManufacturingCompanyController;
use App\Http\Controllers\admin\OfferCodeController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductFlagController;
use App\Http\Controllers\admin\PromoCodeController;
use App\Http\Controllers\admin\SellTypeController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\SubSubCategoryController;
use App\Http\Controllers\admin\TaxController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\user\ContactUsController;
use App\Http\Controllers\user\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('units', UnitController::class);
    Route::resource('tax', TaxController::class);
    Route::resource('sell-types', SellTypeController::class);
    Route::resource('product-flags', ProductFlagController::class);
    Route::resource('manufacturing-companies', ManufacturingCompanyController::class);
    Route::resource('delivery-times', DeliveryTimeController::class);
    Route::resource('pages', PageController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('sub-sub-categories', SubSubCategoryController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('promo-codes', PromoCodeController::class);
    Route::get('get-sub-category', [ProductController::class, 'get_sub_category'])->name('get-sub-category');
    Route::get('get-sub-sub-category', [ProductController::class, 'get_sub_sub_category'])->name('get-sub-sub-category');
    Route::post('projects/media', [ProductController::class, 'storeMedia'])->name('projects.storeMedia');
    Route::post('delete_image', [ProductController::class, 'delete_image'])->name('delete_image');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

