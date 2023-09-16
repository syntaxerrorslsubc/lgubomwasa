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

            Route::get('/admin/add_billing/search/consumertype/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'searchType'])->name('adminadd_billing.search');

            Route::get('/admin/add_billing/search/prevBilling/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'searchPrevBilling'])->name('adminadd_billing.searchBilling');

            Route::get('/admin/edit_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'editBilling'])->name('adminedit_billing');
            Route::post('/admin/edit_billing/update', [App\Http\Controllers\Admin\BillingsController::class, 'updateBilling'])->name('adminedit_billing.update');

            Route::get('/admin/view_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'view_billing'])->name('adminview_billing');

            Route::get('/admin/delete_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'deleteBilling'])->name('admindelete_billing');

            Route::get('/admin/print-document}', [App\Http\Controllers\Admin\BillingsController::class, 'printBilling'])->name('adminprint_billing');



            #Category
            Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admincategory');

            Route::get('/admin/add_category/', [App\Http\Controllers\Admin\CategoryController::class, 'add_category'])->name('admin.category.add');
            Route::post('/admin/add_category/save', [App\Http\Controllers\Admin\CategoryController::class, 'saveCategory'])->name('adminadd_category.save');

            Route::get('/admin/edit_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit_category'])->name('adminedit_category');
            Route::post('/admin/edit_category/update', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('adminedit_category.update');

            Route::get('/admin/view_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'view_category'])->name('adminview_category');

            Route::get('/admin/delete_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('admindelete_category');


           

           #CLIENTS
            Route::get('/admin/clients', [App\Http\Controllers\Admin\ClientsController::class, 'index'])->name('adminclients');
            Route::get('/admin/billing_history', [App\Http\Controllers\Admin\ClientsController::class, 'billing_history'])->name('adminbilling_history');

            
            Route::get('/admin/add/client', [App\Http\Controllers\Admin\ClientsController::class, 'addClient'])->name('admin.clients.add');
            Route::post('/admin/add_client/save', [App\Http\Controllers\Admin\ClientsController::class, 'saveClient'])->name('adminadd_clients.save');


            Route::get('/admin/edit_client/{id}', [App\Http\Controllers\Admin\ClientsController::class, 'editClient'])->name('adminedit_client');
            Route::post('/admin/edit_client/update', [App\Http\Controllers\Admin\ClientsController::class, 'updateClient'])->name('adminedit_client.update');

            Route::get('/admin/view_client/{id}', [App\Http\Controllers\Admin\ClientsController::class, 'view_client'])->name('adminview_client');

            Route::get('/admin/delete_client/{id}', [App\Http\Controllers\Admin\ClientsController::class, 'deleteClient'])->name('admindelete_client');
 
            Route::get('/admin/billings/billing_history/{clientid}', [App\Http\Controllers\BillingHistoryController::class, 'history'])->name('adminbillinghistory');

            #REPORTS
            Route::get('/admin/monthly_billing', [App\Http\Controllers\Admin\ReportsController::class, 'monthly_billing'])->name('adminmonthly_billing');
            Route::get('/admin/daily_billing', [App\Http\Controllers\Admin\ReportsController::class, 'daily_billing'])->name('admindaily_billing');


            #SYSTEMINFO
            Route::get('/admin/system_info', [App\Http\Controllers\Admin\SystemInfoController::class, 'index'])->name('adminsystem_info');

            #USERLIST
              Route::get('/admin/user', [App\Http\Controllers\Admin\UserlistController::class, 'index'])->name('adminuser');

            Route::get('/admin/user/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'layout'])->name('adminusers');


            Route::get('/admin/add_user/', [App\Http\Controllers\Admin\UserlistController::class, 'add_user'])->name('admin.user.add');
            Route::post('/admin/add_user/save', [App\Http\Controllers\Admin\UserlistController::class, 'saveUser'])->name('admin_user.save');

            Route::get('/admin/edit_user/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'editUser'])->name('adminedit_user');
            Route::post('/admin/edit_user/update', [App\Http\Controllers\Admin\UserlistController::class, 'updateuser'])->name('adminedit_user.update');

            Route::get('/admin/userlist', [App\Http\Controllers\Admin\UserlistController::class, 'list'])->name('adminuserlist');

             Route::get('/admin/delete_user/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'deleteUser'])->name('admindelete_user');
             Route::get('/admin/delete_user/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'deleteUser'])->name('admindelete_user');
		});


        #CASHIER
        Route::group(['middleware' => ['cashier']], function () {
            Route::get('/cashier', [App\Http\Controllers\Cashier\CashierController::class, 'index'])->name('cashierdashboard');
            
            #Billings

            Route::get('/cashier/billings', [App\Http\Controllers\Cashier\BillingsController::class, 'index'])->name('cashierbillings');

            Route::get('/cashier/edit_billing/{id}', [App\Http\Controllers\Cashier\BillingsController::class, 'editBilling'])->name('cashieredit_billing');
            Route::post('/cashier/edit_billing/update', [App\Http\Controllers\Cashier\BillingsController::class, 'updateBilling'])->name('cashieredit_billing.update');

            Route::get('/cashier/view_billing/{id}', [App\Http\Controllers\Cashier\BillingsController::class, 'view_billing'])->name('cashierview_billing');

            #Clients 

            Route::get('/cashier/clients', [App\Http\Controllers\Cashier\ClientsController::class, 'index'])->name('cashierclients');
            Route::get('/cashier/billings/billing_history/{clientid}', [App\Http\Controllers\BillingHistoryController::class, 'historyCash'])->name('cashierbillinghistory');


            Route::get('/cashier/edit_client/{id}', [App\Http\Controllers\Cashier\ClientsController::class, 'editClient'])->name('cashieredit_client');
            Route::post('/cashier/edit_client/update', [App\Http\Controllers\Cashier\ClientsController::class, 'updateClient'])->name('cashieredit_client.update');

            Route::get('/cashier/view_client/{id}', [App\Http\Controllers\Cashier\ClientsController::class, 'view_client'])->name('cashierview_client');


            #Reports

            Route::get('/cashier/monthly_billing', [App\Http\Controllers\Cashier\ReportsController::class, 'monthly_billing'])->name('cashiermonthly_billing');
            Route::get('/cashier/report', [App\Http\Controllers\Cashier\ReportsController::class, 'monthly_billing'])->name('cashiermonthly_billing');           

        });

        #MeterReader
        Route::group(['middleware' => ['meterreader']], function () {
            Route::get('/meterreader', [App\Http\Controllers\MeterReader\MeterReaderController::class, 'index'])->name('meterreaderdashboard');

            #Billings
                Route::get('/meterreader/billings', [App\Http\Controllers\MeterReader\BillingsController::class, 'index'])->name('meterreaderbillings');

                    Route::get('/meterreader/add_billing/', [App\Http\Controllers\MeterReader\BillingsController::class, 'addBilling'])->name('meterreaderadd_billing');
                    Route::post('/meterreader/add_billing/save', [App\Http\Controllers\MeterReader\BillingsController::class, 'saveBilling'])->name('meterreaderadd_billing.save');

                    Route::get('/meterreader/add_billing/search/consumertype/{id}', [App\Http\Controllers\MeterReader\BillingsController::class, 'searchType'])->name('meterreaderadd_billing.search');

                    Route::get('/meterreader/add_billing/search/prevBilling/{id}', [App\Http\Controllers\MeterReader\BillingsController::class, 'searchPrevBilling'])->name('meterreaderadd_billing.searchBilling');

                    Route::get('/meterreader/edit_billing/{id}', [App\Http\Controllers\MeterReader\BillingsController::class, 'editBilling'])->name('meterreaderedit_billing');
                    Route::post('/meterreader/edit_billing/update', [App\Http\Controllers\MeterReader\BillingsController::class, 'updateBilling'])->name('meterreaderedit_billing.update');

                    Route::get('/meterreader/view_billing/{id}', [App\Http\Controllers\MeterReader\BillingsController::class, 'view_billing'])->name('meterreaderview_billing');

                    Route::get('/meterreader/delete_billing/{id}', [App\Http\Controllers\MeterReader\BillingsController::class, 'deleteBilling'])->name('meterreaderdelete_billing');

                    Route::get('/meterreader/print-document}', [App\Http\Controllers\MeterReader\BillingsController::class, 'printBilling'])->name('meterreaderprint_billing');         

            #Clients
                Route::get('/meterreader/view_client/{id}', [App\Http\Controllers\MeterReader\ClientsController::class, 'view_client'])->name('meterreaderview_client');

                Route::get('/meterreader/clients', [App\Http\Controllers\MeterReader\ClientsController::class, 'index'])->name('meterreaderclients');
            });


        #Users
        
            Route::get('/users', [App\Http\Controllers\userController::class, 'index'])->name('user');

});



