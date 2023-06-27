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
		});

        #CASHIER
        Route::group(['middleware' => ['cashier']], function () {
            Route::get('/cashier', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('cashierdashboard');
        });

        #MeterReader
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/meterreader', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('meterreaderdashboard');

        #Billings
            Route::get('/MeterReader/manage_billings', [App\Http\Controllers\Cashier\CashierController::class, 'manage_billings'])->name('manage_billings');
            Route::get('/MeterReader/view_billings', [App\Http\Controllers\Cashier\CashierController::class, 'view_billings'])->name('view_billings');
            Route::get('/MeterReader/billings', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('billings');

        #Clients

            Route::get('/MeterReader/billing_history', [App\Http\Controllers\Cashier\CashierController::class, 'billing_history'])->name('billing_history');
            Route::get('/MeterReader/manage_client', [App\Http\Controllers\Cashier\CashierController::class, 'manage_client'])->name('manage_client');
            Route::get('/MeterReader/view_client', [App\Http\Controllers\Cashier\CashierController::class, 'view_client'])->name('view_client');
            Route::get('/MeterReader/clients', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('clients');
        });

        #CommonUser
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/User', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('userdashboard');
         });

});



