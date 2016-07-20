<?php

use App\Category;
use App\Customer;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Product;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('mm', function () {
    return Customer::where('id',1)->with('payments','invoices')->first();
});
Route::get('/', function () {
    App::setLocale('en');

    return view('customers.create');

    return redirect('/users');
});

Route::resource('categories', 'CategoriesController');
Route::resource('customers', 'CustomersController');
Route::resource('products', 'ProductsController');
Route::resource('invoices', 'InvoicesController');
Route::get('customer/{id}/invoice/create','InvoicesController@newCustomerInvoice');
Route::post('customer/{id}/invoice/store','CustomersController@storeInvoice');
Route::post('customer/payment/store','CustomersController@storePayment');
// Route::get('yousef', function () {
//
//     \DB::connection()->enableQueryLog();
//
//     return  Category::whereIn('id', [1, 2])->with('products')->get();
//     $queries = \DB::getQueryLog();
//     dd($queries);
// });

Route::post('/api/customers/', function (Request $request) {
    return Customer::create($request::all());
});
Route::get('/api/customers', function () {
    return Customer::where('workgroup',1)->get();
});


Route::get('/api/categories', function () {
    return Category::all();
});
Route::get('/api/products/category/{id}', function ($id) {
    return Category::findOrFail($id)->products;
});
Route::get('/api/products/', function () {
    return Product::all();
});
Route::get('/api/invoices/customer/{id}', function ($id) {
    return Customer::findOrFail($id)->invoices;
});

Route::get('cats', function () {
    return Category::where('id', 1)->with('products')->get();
});

Route::get('/{lang?}', function ($lang = 'en') {
    App::setLocale($lang);
    // $customer =  Customer::where('id', 1)->get();
    // return $customer;
    return view('master');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
