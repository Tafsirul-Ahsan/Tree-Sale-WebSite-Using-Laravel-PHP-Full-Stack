<?php



use App\Mail\DemoMail;

use Illuminate\Support\Facades\Mail;




Route::get('/','WelcomeController@index');
Route::get('/product-details-{id}','WelcomeController@details');
Route::get('/about','WelcomeController@about');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// admin login
Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('/admin/login', 'Auth\AdminLoginController@login');

// admin product

Route::resource('admin/products','ProductController');

//cart
Route::get('/cart','WelcomeController@cart');
Route::post('/cart/addtocart','WelcomeController@addcart');
Route::get('cart/remove-item/{id}','WelcomeController@removecart');

Route::post('/payment','WelcomeController@payment');
Route::post('/search','WelcomeController@search');

//profile
Route::get('/love-list','ProfileController@lovelist');
Route::get('/addtolist/{pid}','ProfileController@addtolist');


Route::get('mail',function(){

	return view('mail');
});

Route::post('mail',function(){

 Mail::to('arpodey001@gmail.com')->send(new DemoMail());


});

Route::post('/payment/success','ProfileController@success');

Route::get('/admin/orders','OrderController@index');
Route::get('/admin/orders/{id}','OrderController@confirm');

