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
            Route::get('/admin/manage_billings', [App\Http\Controllers\Admin\BillingsController::class, 'manage_billings'])->name('adminmanage_billings');
            Route::post('/admin/manage_billings/store', [App\Http\Controllers\Admin\BillingsController::class, 'storeBilling'])->name('adminmanage_billings_store');
            Route::get('/admin/view_billings', [App\Http\Controllers\Admin\BillingsController::class, 'view_billings'])->name('adminview_billings');
			Route::get('/admin/billings', [App\Http\Controllers\Admin\BillingsController::class, 'index'])->name('adminbillings');

            #Category
            Route::get('/admin/manage_category', [App\Http\Controllers\Admin\CategoryController::class, 'manage_category'])->name('adminmanage_category');
            Route::get('/admin/view_category', [App\Http\Controllers\Admin\CategoryController::class, 'view_category'])->name('adminview_category');
            Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admincategory');

           #CLIENTS
            Route::get('/admin/billing_history', [App\Http\Controllers\Admin\ClientsController::class, 'billing_history'])->name('adminbilling_history');
            Route::get('/admin/manage_client', [App\Http\Controllers\Admin\ClientsController::class, 'manage_client'])->name('adminmanage_client');
            Route::get('/admin/view_client', [App\Http\Controllers\Admin\ClientsController::class, 'view_client'])->name('adminview_client');
            Route::get('/admin/clients', [App\Http\Controllers\Admin\ClientsController::class, 'index'])->name('adminclients');

            #REPORTS
            Route::get('/admin/monthly_billing', [App\Http\Controllers\Admin\ReportsController::class, 'monthly_billing'])->name('adminmonthly_billing');

            #SYSTEMINFO
            Route::get('/admin/system_info', [App\Http\Controllers\Admin\SystemInfoController::class, 'index'])->name('adminsystem_info');

            #USERLIST
            Route::get('/admin/user', [App\Http\Controllers\Admin\UserlistController::class, 'index'])->name('adminuser');
            Route::get('/admin/manage_user', [App\Http\Controllers\Admin\UserlistController::class, 'manage_user'])->name('adminmanage_user');
            Route::get('/admin/userlist', [App\Http\Controllers\Admin\UserlistController::class, 'list'])->name('adminuserlist');
           
		});


        #CASHIER
        Route::group(['middleware' => ['cashier']], function () {
            Route::get('/cashier', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('cashierdashboard');
            
            #Billings

            Route::get('/cashier/manage_billings', [App\Http\Controllers\Cashier\BillingsController::class, 'manage_billings'])->name('cashiermanage_billings');
            Route::get('/cashier/view_billings', [App\Http\Controllers\Cashier\BillingsController::class, 'view_billings'])->name('cashierview_billings');
            Route::get('/cashier/billings', [App\Http\Controllers\Cashier\BillingsController::class, 'index'])->name('cashierbillings');

            #Clients

            Route::get('/cashier/billing_history', [App\Http\Controllers\Cashier\ClientsController::class, 'billing_history'])->name('billing_history');
            Route::get('/cashier/manage_client', [App\Http\Controllers\Cashier\ClientsController::class, 'manage_client'])->name('manage_client');
            Route::get('/cashier/view_client', [App\Http\Controllers\Cashier\ClientsController::class, 'view_client'])->name('view_client');
            Route::get('/cashier/clients', [App\Http\Controllers\Cashier\ClientsController::class, 'index'])->name('cashierclients');


            #Reports

            Route::get('/cashier/monthly_billing', [App\Http\Controllers\Cashier\ReportsController::class, 'monthly_billing'])->name('cashiermonthly_billing');
           

        });

        #MeterReader
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/meterreader', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'index'])->name('meterreaderdashboard');

            #Billings
                    Route::get('/meterreader/manage_billings', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'manage_billings'])->name('manage_billings');
                    Route::get('/meterreader/view_billings', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'view_billings'])->name('view_billings');
                    Route::get('/meterreader/billings', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'index'])->name('billings');

            #Clients

                Route::get('/meterreader/billing_history', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'billing_history'])->name('billing_history');
                Route::get('/meterreader/manage_client', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'manage_client'])->name('manage_client');
                Route::get('/meterreader/view_client', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'view_client'])->name('view_client');
                Route::get('/meterreader/clients', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'index'])->name('clients');
            });


        #Users
        
            Route::get('/users', [App\Http\Controllers\userController::class, 'index'])->name('user');

});



