<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
	return redirect()->route('customer.index');
});




Route::get('/registration','RegistrationController@index');
Route::post('/registration','RegistrationController@show');



Route::group(['middleware'=>['loginverify']], function(){
	Route::resource('/login','LoginController');
});

Route::get('/logout','LogoutController@index')->name('logout.index');



Route::group(['middleware'=>['RestrictGuestUser']], function(){
	Route::get('/changepassword','CustomerController@changePassword')->name('customer.changePassword');
	Route::get('/showcart','CustomerController@showcart')->name('customer.showcart');
	Route::get('/showordered','CustomerController@showordered')->name('customer.showordered');
	Route::get('/rateproduct/{pid}','CustomerController@rateproduct')->name('customer.rateproduct');
});




Route::get('/search','CustomerController@search')->name('customer.search');
Route::get('/showproduct/{pid}','CustomerController@showproduct')->name('customer.showproduct');
Route::get('/customer/showproduct/{pid}','CustomerController@showproduct')->name('customer.showproduct');

Route::resource('/customer','CustomerController');









/*---------------------ajax------------------*/

Route::get('/getCartData','CustomerController@getCartData')->name('customer.getCartData');
Route::get('/getSearchData','CustomerController@getSearchData')->name('customer.getSearchData');
Route::get('/getPageSearchedData','CustomerController@getPageSearchedData')->name('customer.getPageSearchedData');
Route::get('/getOrderedData','CustomerController@getOrderedData')->name('customer.getOrderedData');
Route::get('/getHomePageData','CustomerController@getHomePageData')->name('customer.gethome');
Route::get('/getProductData','CustomerController@getProductData')->name('customer.getProductData');
Route::get('/getCommentRating','CustomerController@getCommentRating')->name('customer.getCommentRating');
Route::get('/addtocart','CustomerController@addtocart')->name('customer.addtocart');
Route::get('/confirmOrder','CustomerController@confirmOrder')->name('customer.confirmOrder');
Route::get('/CancelOrder','CustomerController@CancelOrder')->name('customer.CancelOrder');
Route::get('/changeQuantityInCart','CustomerController@changeQuantityInCart')->name('customer.changeQuantityInCart');
Route::get('/deleteCartProduct','CustomerController@deleteCartProduct')->name('customer.deleteCartProduct');
Route::get('/getUserReview','CustomerController@getUserReview')->name('customer.getUserReview');
Route::get('/insertreview','CustomerController@insertreview')->name('customer.insertreview');

/*---------------------ajax------------------*/































/*---------------------------admin---------------------*/

Route::group(['middleware'=>['sess']], function(){

	Route::get('/home', 'HomeController@index')->name('home.index');
	/*Route::get('/home/upload/', 'HomeController@upload')->name('home.upload');
	Route::post('/home/upload/', 'HomeController@storePhoto');
	Route::get('/home/profile/', 'HomeController@profile')->name('home.profile');*/

	Route::get('/home/action', 'HomeController@action')->name('home.action');
	

	
	
	Route::group(['middleware'=>['admin']], function(){
		Route::get('/user', 'EmployeeController@index')->name('employee.index');
	    Route::get('/user/show/{id}', 'EmployeeController@show')->name('employee.show');
		Route::get('/user/create/', 'EmployeeController@create')->name('employee.create');
		Route::post('/user/create/', 'EmployeeController@store');
		Route::get('/user/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
		Route::post('/user/edit/{id}', 'EmployeeController@update');
		Route::get('/user/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
		Route::post('/user/delete/{id}', 'EmployeeController@destroy');

		Route::get('/product', 'ProductController@index')->name('product.index');
	    Route::get('/product/show/{id}', 'ProductController@show')->name('product.show');
		Route::get('/product/create/', 'ProductController@create')->name('product.create');
		Route::post('/product/create/', 'ProductController@store');
		Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
		Route::post('/product/edit/{id}', 'ProductController@update');
		Route::get('/product/delete/{id}', 'ProductController@delete')->name('product.delete');
		Route::post('/product/delete/{id}', 'ProductController@destroy');
	});
	
});
























