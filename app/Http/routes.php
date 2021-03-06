<?php

use App\Category;
use App\Customer;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Invoice;
use App\Payment;
use App\Product;

// Route::get('mm', function () {
//     return Customer::where('id',1)->with('payments','invoices')->first();
// });
// Route::get('/', function () {
//     App::setLocale('en');

//     return view('customers.create');

//     return redirect('/users');
// });
    // Route::get('yousef', function () {
    //
    //     \DB::connection()->enableQueryLog();
    //
    //     return  Category::whereIn('id', [1, 2])->with('products')->get();
    //     $queries = \DB::getQueryLog();
    //     dd($queries);
    // });
    // Route::auth();


    Route::group(['middleware' => ['web']], function(){
        
        Route::get('login', 'Auth\AuthController@showLoginForm')->name('user.login');
        Route::post('login', 'Auth\AuthController@login');
        Route::get('logout', 'Auth\AuthController@logout');

        // Registration Routes...
        Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('user.register');
        Route::post('register', 'Auth\AuthController@register');

        // Password Reset Routes...
        Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
        Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Auth\PasswordController@reset');

    });  
    Route::group(['middleware' => ['web','auth']], function(){

        Route::get('/',function(){ 
            return redirect('/dashboard'); 
        });
        Route::get('/dashboard', 'DashboardController@index');        
        Route::resource('categories', 'CategoriesController');
        Route::resource('customers', 'CustomersController');
        Route::resource('products', 'ProductsController');
        Route::resource('invoices', 'InvoicesController');
        Route::resource('suppliers', 'SuppliersController');

        Route::get('customer/{id}/invoice/create','InvoicesController@newCustomerInvoice');

        Route::get('/api/customers', function () { return Customer::customers()->get(); });
        Route::get('/api/suppliers', function () { return Customer::suppliers()->get(); });
        Route::get('/api/categories', function () { return Category::all(); });
        Route::get('/api/products/', function () { return Product::all(); });

        Route::get('/api/products/category/{id}', function ($id) { return Category::findOrFail($id)->products; });
        Route::get('/api/invoices/customer/{id}', function ($id) { return Customer::findOrFail($id)->invoices; });

        Route::post('customer/{id}/invoice/store','CustomersController@storeInvoice');
        Route::post('customer/payment/store','CustomersController@storePayment');
        Route::post('/api/customers/', function (Request $request) { return Customer::create($request::all()); });
        
        Route::get('{view}', function ($view) {
            try {
              return view($view);
            } catch (\Exception $e) {
              abort(404);
            }
        })->where('view', '.*');
        // Route::group(['middleware' => ['web']], function () {

        // });
            // Route::get('login', 'AuthController@showLoginForm');
        
        // Route::post('/login','Auth\AuthController@postLogin');
        Route::get('/home', 'HomeController@index');

});