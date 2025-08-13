<?php

namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('landing', function () {
    return view('landing');
});

// FRONTEND START

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::post('subscribeNewsletter', [HomeController::class, 'store'])->name('subscribeNewsletter');
Route::post('getContactDetails', [HomeController::class, 'getContactDetails'])->name('getContactDetails');

Route::get('mbdhome', [HomeController::class, 'newHome'])->name('new.home');
Route::get('mbdabout', [HomeController::class, 'newAbout'])->name('new.about');
Route::get('gallery', [HomeController::class, 'newGallery'])->name('new.gallery');
Route::get('mbdcontact', [HomeController::class, 'newContact'])->name('new.contact');
Route::get('product-details', [HomeController::class, 'productDetails'])->name('product.details.view');


// LOGIN
Route::group(['middleware' => ['guest', 'preventBackHistory']], function () {

    Route::get('admin/login', [LoginController::class, 'index'])->name('login');
    Route::post('admin/login', [LoginController::class, 'authenticate'])->name('signin');
});

// DASHBOARD
Route::group(['middleware' => ['auth', 'preventBackHistory']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CHANGE PASSWORD
        Route::get('admin/change-password', [ForgotPasswordController::class, 'changePassword'])->name('change.password');
        Route::post('admin/create-new-password', [ForgotPasswordController::class, 'createNewPassword'])->name('create.new.password');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');


        /////////   ADMIN   //////////

        // Product
        Route::get('products/{id}', [ProductsController::class, 'index'])->name('products');
        Route::get('product/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('product/store', [ProductsController::class, 'store'])->name('products.store');
        Route::get('product/show', [ProductsController::class, 'show'])->name('products.show');
        Route::get('product/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::post('product/update', [ProductsController::class, 'update'])->name('products.update');
        Route::get('product/delete', [ProductsController::class, 'destroy'])->name('products.delete');
        Route::get('product/{id}', [ProductsController::class, 'View'])->name('products.view');
        Route::post('product-upload-image', [ProductsController::class, 'uploadImage'])->name('products.upload.image');

        Route::get('product-status-change', [ProductsController::class, 'changestatus'])->name('products.change.status');
        // Route::group(['middleware' => ['CheckIsAdmin']], function () {
            // Category
            Route::get('categories', [CategoryController::class, 'index'])->name('categories');
            Route::get('category/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('category/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('category/show', [CategoryController::class, 'show'])->name('categories.show');
            Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('category/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('category/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
            Route::get('category/{id}', [CategoryController::class, 'View'])->name('categories.view');
            Route::post('category-upload-image', [CategoryController::class, 'uploadImage'])->name('categories.upload.image');

            Route::get('category-status-change', [CategoryController::class, 'changestatus'])->name('categories.change.status');
        // });




        // Product
        Route::get('quotes/{id}', [QuotesController::class, 'index'])->name('quotes');
        Route::get('quote/create', [QuotesController::class, 'create'])->name('quotes.create');
        Route::post('quote/store', [QuotesController::class, 'store'])->name('quotes.store');
        Route::get('quote/show/{id}', [QuotesController::class, 'show'])->name('quotes.show');
        Route::get('quote/edit/{id}', [QuotesController::class, 'edit'])->name('quotes.edit');
        Route::post('quote/update', [QuotesController::class, 'update'])->name('quotes.update');
        Route::get('quote/delete', [QuotesController::class, 'destroy'])->name('quotes.delete');
        Route::get('quote/{id}', [QuotesController::class, 'View'])->name('quotes.view');
        Route::post('quote-upload-image', [QuotesController::class, 'uploadImage'])->name('quotes.upload.image');

        Route::get('quote-status-change', [QuotesController::class, 'changestatus'])->name('quotes.change.status');






        // Vendor
        Route::get('homepage', [HomepageController::class, 'index'])->name('homepages');
        Route::get('homepage/create', [HomepageController::class, 'create'])->name('homepages.create');
        Route::post('homepage/store', [HomepageController::class, 'store'])->name('homepages.store');
        Route::get('homepage/show', [HomepageController::class, 'show'])->name('homepages.show');
        Route::get('homepage/edit/{id}', [HomepageController::class, 'edit'])->name('homepages.edit');
        Route::post('homepage/update', [HomepageController::class, 'update'])->name('homepages.update');
        Route::get('homepage/delete', [HomepageController::class, 'destroy'])->name('homepages.delete');
        Route::get('homepage/{id}', [HomepageController::class, 'View'])->name('homepages.view');
        Route::post('homepage-upload-image', [HomepageController::class, 'uploadImage'])->name('homepages.upload.image');
        Route::get('homepage-status-change', [HomepageController::class, 'changestatus'])->name('homepages.change.status');





        Route::get('cms', [PagesController::class, 'index'])->name('cms');
        Route::get('cms/create', [PagesController::class, 'create'])->name('cms.create');
        Route::post('cms/store', [PagesController::class, 'store'])->name('cms.store');
        Route::get('cms/show', [PagesController::class, 'show'])->name('cms.show');
        Route::get('cms/edit/{id}', [PagesController::class, 'edit'])->name('cms.edit');
        Route::post('cms/update', [PagesController::class, 'update'])->name('cms.update');
        Route::get('cms/delete', [PagesController::class, 'destroy'])->name('cms.delete');
        Route::get('cms/{id}', [PagesController::class, 'View'])->name('cms.view');
        Route::post('cms-upload-image', [PagesController::class, 'uploadImage'])->name('cms.upload.image');
        Route::get('cms-status-change', [PagesController::class, 'changestatus'])->name('cms.change.status');







        Route::get('vendors/{id}', [VendorsController::class, 'index'])->name('vendors');
        Route::get('vendor/create', [VendorsController::class, 'create'])->name('vendors.create');
        Route::post('vendor/store', [VendorsController::class, 'store'])->name('vendors.store');
        Route::get('vendor/show', [VendorsController::class, 'show'])->name('vendors.show');
        Route::get('vendor/edit/{id}', [VendorsController::class, 'edit'])->name('vendors.edit');
        Route::post('vendor/update', [VendorsController::class, 'update'])->name('vendors.update');
        Route::post('vendor/update-password', [VendorsController::class, 'updatePassword'])->name('vendors.update.password');
        Route::get('vendor/delete', [VendorsController::class, 'destroy'])->name('vendors.delete');
        Route::get('vendor/{id}', [VendorsController::class, 'View'])->name('vendors.view');
        Route::post('vendor-upload-image', [VendorsController::class, 'uploadImage'])->name('vendors.upload.image');
        Route::get('vendor-status-change', [VendorsController::class, 'changestatus'])->name('vendors.change.status');






        // Vendor
        Route::get('brands', [BrandsController::class, 'index'])->name('brands');
        Route::get('brand/create', [BrandsController::class, 'create'])->name('brands.create');
        Route::post('brand/store', [BrandsController::class, 'store'])->name('brands.store');
        Route::get('brand/show', [BrandsController::class, 'show'])->name('brands.show');
        Route::get('brand/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
        Route::post('brand/update', [BrandsController::class, 'update'])->name('brands.update');
        Route::get('brand/delete', [BrandsController::class, 'destroy'])->name('brands.delete');
        Route::get('brand/{id}', [BrandsController::class, 'View'])->name('brands.view');
        Route::post('brand-upload-image', [BrandsController::class, 'uploadImage'])->name('brands.upload.image');
        Route::get('brand-status-change', [BrandsController::class, 'changestatus'])->name('brands.change.status');





        // setting
        Route::get('settings', [SettingsController::class, 'index'])->name('settings');
        Route::get('settings/social-login', [SettingsController::class, 'socialLogin'])->name('settings.social.login');
        Route::get('settings/smtp', [SettingsController::class, 'smtp'])->name('settings.smtp');
        Route::get('settings/payment', [SettingsController::class, 'payment'])->name('settings.payment');
        Route::get('settings/file-system', [SettingsController::class, 'fileSystem'])->name('settings.file.system');
        Route::get('settings/feature-activate', [SettingsController::class, 'featureActivate'])->name('settings.feature.activate');
        Route::post('setting/update', [SettingsController::class, 'update'])->name('settings.update');
    });
});


// FRONTEND END
