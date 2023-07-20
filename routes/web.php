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
            Route::get('/admin/billings', [App\Http\Controllers\Admin\BillingsController::class, 'index'])->name('adminbillings');


            Route::get('/admin/add_billing/', [App\Http\Controllers\Admin\BillingsController::class, 'addBilling'])->name('adminadd_billing');
            Route::post('/admin/add_billing/save', [App\Http\Controllers\Admin\BillingsController::class, 'saveBilling'])->name('adminadd_billing.save');


            Route::get('/admin/edit_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'editBilling'])->name('adminedit_billing');
            Route::post('/admin/edit_billing/update', [App\Http\Controllers\Admin\BillingsController::class, 'updateBilling'])->name('adminedit_billing.update');

            Route::get('/admin/view_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'view_billing'])->name('adminview_billing');

            Route::get('/admin/delete_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'deleteBilling'])->name('admindelete_billing');


            #Category
            Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admincategory');

            Route::get('/admin/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'add_category'])->name('admin.category.add');
             Route::post('/admin/category/save', [App\Http\Controllers\Admin\CategoryController::class, 'saveCategory'])->name('admin_category.save');

            Route::get('/admin/view_category', [App\Http\Controllers\Admin\CategoryController::class, 'view_category'])->name('adminview_category');
           

           #CLIENTS
           Route::get('/admin/clients', [App\Http\Controllers\Admin\ClientsController::class, 'index'])->name('adminclients');
            Route::get('/admin/billing_history', [App\Http\Controllers\Admin\ClientsController::class, 'billing_history'])->name('adminbilling_history');

            
            Route::get('/admin/client/add', [App\Http\Controllers\Admin\ClientsController::class, 'add_client'])->name('admin.client.add');
             Route::post('/admin/client/save', [App\Http\Controllers\Admin\ClientsController::class, 'saveClient'])->name('admin_client.save');


            Route::get('/admin/manage_client/', [App\Http\Controllers\Admin\ClientsController::class, 'store_client'])->name('adminmanage_client');
            Route::post('/admin/manage_client/store', [App\Http\Controllers\Admin\ClientsController::class, 'storeClient'])->name('adminmanage_client_store');

            Route::get('/admin/view_client', [App\Http\Controllers\Admin\ClientsController::class, 'view_client'])->name('adminview_client');
           
           

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

            Route::get('/cashier/billings', [App\Http\Controllers\Cashier\BillingsController::class, 'index'])->name('cashierbillings');

             Route::get('/cashier/add_billing/', [App\Http\Controllers\Cashier\BillingsController::class, 'addBilling'])->name('cashieradd_billing');
            Route::post('/cashier/add_billing/save', [App\Http\Controllers\Cashier\BillingsController::class, 'saveBilling'])->name('cashieradd_billing.save');


            Route::get('/cashier/edit_billing/{id}', [App\Http\Controllers\Cashier\BillingsController::class, 'editBilling'])->name('cashieredit_billing');
            Route::post('/cashier/edit_billing/update', [App\Http\Controllers\Cashier\BillingsController::class, 'updateBilling'])->name('cashieredit_billing.update');

            Route::get('/cashier/view_billing/{id}', [App\Http\Controllers\Cashier\BillingsController::class, 'view_billing'])->name('cashierview_billing');

            Route::get('/cashier/delete_billing/{id}', [App\Http\Controllers\Cashier\BillingsController::class, 'deleteBilling'])->name('cashierdelete_billing');


            #Clients 

            Route::get('/cashier/clients', [App\Http\Controllers\Cashier\ClientsController::class, 'index'])->name('cashierclients');
            Route::get('/cashier/billing_history', [App\Http\Controllers\Cashier\ClientsController::class, 'billing_history'])->name('cashierbilling_history');

            
           Route::get('/Cashier/addclient/', [App\Http\Controllers\Cashier\ClientsController::class, 'addclient'])->name('cashieradd_client');
            Route::post('/Cashier/addclient/save', [App\Http\Controllers\Cashier\ClientsController::class, 'saveClient'])->name('cashieradd_client.save');

            Route::get('/cashier/edit_client/{id}', [App\Http\Controllers\Cashier\ClientsController::class, 'editClient'])->name('cashieredit_client');
            Route::post('/cashier/edit_client/update', [App\Http\Controllers\Cashier\ClientsController::class, 'updateClient'])->name('cashieredit_client.update');

            Route::get('/cashier/view_client/{id}', [App\Http\Controllers\Cashier\ClientsController::class, 'view_client'])->name('cashierview_client');

            Route::get('/cashier/delete_client/{id}', [App\Http\Controllers\Cashier\ClientsController::class, 'deleteClient'])->name('cashierdelete_client');


            #Reports

            Route::get('/cashier/monthly_billing', [App\Http\Controllers\Cashier\ReportsController::class, 'monthly_billing'])->name('cashiermonthly_billing');
            Route::get('/cashier/report', [App\Http\Controllers\Cashier\ReportsController::class, 'monthly_billing'])->name('cashiermonthly_billing');           

        });

        #MeterReader
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/meterreader', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'index'])->name('meterreaderdashboard');

            #Billings
                    Route::get('/meterreader/manage_billings', [App\Http\Controllers\MeterReader\BillingsController::class, 'manage_billings'])->name('meterreadermanage_billings');
                    Route::get('/meterreader/view_billings', [App\Http\Controllers\MeterReader\BillingsController::class, 'view_billings'])->name('meterreaderview_billings');
                    Route::get('/meterreader/billings', [App\Http\Controllers\MeterReader\BillingsController::class, 'index'])->name('meterreaderbillings');

            #Clients
                Route::get('/meterreader/manage_client', [App\Http\Controllers\MeterReader\ClientsController::class, 'manage_client'])->name('meterreadermanage_client');
                Route::get('/meterreader/view_client', [App\Http\Controllers\MeterReader\ClientsController::class, 'view_client'])->name('meterreaderview_client');
                Route::get('/meterreader/clients', [App\Http\Controllers\MeterReader\ClientsController::class, 'index'])->name('meterreaderclients');
            });


        #Users
        
            Route::get('/users', [App\Http\Controllers\userController::class, 'index'])->name('user');

});



