<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
 
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
        Route::get('/', function () {
            return redirect('/login');
        });
		Route::group(['middleware' => ['guest']], function() {
        	Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
        	Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 

        	Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
			Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
        });
        Route::group(['middleware' => ['auth']], function() {
           	Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
        });

        #ADMIN
        Route::group(['middleware' => ['admin']], function () {
            Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admindashboard');

            #Billing
            Route::get('/admin/manage_billings', [App\Http\Controllers\Admin\BillingsController::class, 'manage_billings'])->name('manage_billings');
            Route::get('/admin/view_billings', [App\Http\Controllers\Admin\BillingsController::class, 'view_billings'])->name('view_billings');
			Route::get('/admin/billings', [App\Http\Controllers\Admin\BillingsController::class, 'index'])->name('billings');

            #Category
            Route::get('/admin/manage_category', [App\Http\Controllers\Admin\CategoryController::class, 'manage_category'])->name('manage_category');
            Route::get('/admin/view_category', [App\Http\Controllers\Admin\CategoryController::class, 'view_category'])->name('view_category');
            Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'category'])->name('category');



		});

        #CASHIER
        Route::group(['middleware' => ['cashier']], function () {
            Route::get('/cashier', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('cashierdashboard');
        });

        #MeterReader
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/MeterReader', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('meterreaderdashboard');
        });

        #CommonUser
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/User', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('userdashboard');
         });

});



