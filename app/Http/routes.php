<?php

use App\Category;
use App\Customer;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
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
        Route::get('login', 'Auth\AuthController@showLoginForm');
        Route::post('login', 'Auth\AuthController@login');
        Route::get('logout', 'Auth\AuthController@logout');

        // Registration Routes...
        Route::get('register', 'Auth\AuthController@showRegistrationForm');
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
        Route::get('/dashboard', function(){
            return view('dashboard');
        });
        Route::resource('categories', 'CategoriesController');
        Route::resource('customers', 'CustomersController');
        Route::resource('products', 'ProductsController');
        Route::resource('invoices', 'InvoicesController');

        Route::get('customer/{id}/invoice/create','InvoicesController@newCustomerInvoice');

        Route::get('/api/customers', function () { return Customer::where('workgroup',1)->get(); });
        Route::get('/api/categories', function () { return Category::all(); });
        Route::get('/api/products/', function () { return Product::all(); });

        Route::get('/api/products/category/{id}', function ($id) { return Category::findOrFail($id)->products; });
        Route::get('/api/invoices/customer/{id}', function ($id) { return Customer::findOrFail($id)->invoices; });

        Route::post('customer/{id}/invoice/store','CustomersController@storeInvoice');
        Route::post('customer/payment/store','CustomersController@storePayment');
        Route::post('/api/customers/', function (Request $request) { return Customer::create($request::all()); });
        
        // Route::group(['middleware' => ['web']], function () {

        // });
            // Route::get('login', 'AuthController@showLoginForm');
        
        // Route::post('/login','Auth\AuthController@postLogin');
        Route::get('/home', 'HomeController@index');

});