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


            Route::get('/admin/edit_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'editBilling'])->name('adminedit_billing');
            Route::post('/admin/edit_billing/update', [App\Http\Controllers\Admin\BillingsController::class, 'updateBilling'])->name('adminedit_billing.update');

            Route::get('/admin/view_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'view_billing'])->name('adminview_billing');

            Route::get('/admin/delete_billing/{id}', [App\Http\Controllers\Admin\BillingsController::class, 'deleteBilling'])->name('admindelete_billing');


            #Category
            Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admincategory');

            Route::get('/admin/add_category/', [App\Http\Controllers\Admin\CategoryController::class, 'add_category'])->name('admin.category.add');
             Route::post('/admin/add_category/save', [App\Http\Controllers\Admin\CategoryController::class, 'saveCategory'])->name('adminadd_category.save');

              Route::get('/admin/edit_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('adminedit_category');
            Route::post('/admin/edit_category/update', [App\Http\Controllers\Admin\CategoryController::class, 'updatecategory'])->name('adminedit_category.update');

            Route::get('/admin/view_category', [App\Http\Controllers\Admin\CategoryController::class, 'view_category'])->name('adminview_category');

            Route::get('/admin/delete_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('admindelete_category');

           

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

            Route::get('/admin/add_user/', [App\Http\Controllers\Admin\UserlistController::class, 'add_user'])->name('admin.user.add');
            Route::post('/admin/add_user/save', [App\Http\Controllers\Admin\UserlistController::class, 'saveUser'])->name('admin_user.save');

            Route::get('/admin/edit_user/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'editUser'])->name('adminedit_user');
            Route::post('/admin/edit_user/update', [App\Http\Controllers\Admin\UserlistController::class, 'updateuser'])->name('adminedit_user.update');

            Route::get('/admin/userlist', [App\Http\Controllers\Admin\UserlistController::class, 'list'])->name('adminuserlist');

             Route::get('/admin/delete_user/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'deleteUser'])->name('admindelete_user');

           
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



