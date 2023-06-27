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
            
            #Billings

            Route::get('/cashier/manage_billings', [App\Http\Controllers\Cashier\BillingsController::class, 'manage_billings'])->name('manage_billings');
            Route::get('/cashier/view_billings', [App\Http\Controllers\Cashier\BillingsController::class, 'view_billings'])->name('view_billings');
            Route::get('/cashier/billings', [App\Http\Controllers\Cashier\BillingsController::class, 'index'])->name('billings');

            #Clients

            Route::get('/cashier/billing_history', [App\Http\Controllers\Cashier\ClientsController::class, 'billing_history'])->name('billing_history');
            Route::get('/cashier/manage_client', [App\Http\Controllers\Cashier\ClientsController::class, 'manage_client'])->name('manage_client');
            Route::get('/cashier/view_client', [App\Http\Controllers\Cashier\ClientsController::class, 'view_client'])->name('view_client');
            Route::get('/cashier/clients', [App\Http\Controllers\Cashier\ClientsController::class, 'index'])->name('clients');


            #Reports

            Route::get('/cashier/monthly_billing', [App\Http\Controllers\Cashier\ReportsController::class, 'monthly_billing'])->name('monthly_billing');
           

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



