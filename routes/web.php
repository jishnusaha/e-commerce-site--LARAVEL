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

























/*----------------------------------saler---------------------*/



route::group(['middleware'=>['salersession']],function()
{
	Route::get('/shopkeeper/logout','LogoutController@index')->name('LogoutController.index');
	
	Route::get('/shopkeeper/home', 'ShopkeeperController@index')->name('ShopkeeperController.index');
	Route::get('/shopkeeper/home/fetch', 'ShopkeeperController@fetch')->name('home.fetch');
	Route::post('/shopkeeper/home', 'ShopkeeperController@show')->name('home.show');

	
	Route::get('/shopkeeper/deleteyes/{id}','ShopkeeperController@deleteyes');
	Route::get('/shopkeeper/deleteno/{id}','ShopkeeperController@deleteno');

	Route::get('/shopkeeper/advertisement', 'ShopkeeperController@proadver')->name('ShopkeeperController.proadver');
	Route::post('/shopkeeper/advertisement', 'ShopkeeperController@proadverpost');

	Route::get('/shopkeeper/availableproduct', 'ShopkeeperController@availpro')->name('ShopkeeperController.availpro');

	Route::get('/shopkeeper/productedit/{id}', 'ShopkeeperController@productedit')->name('ShopkeeperController.productedit');
	Route::post('/shopkeeper/productedit/{id}', 'ShopkeeperController@productedited');

	Route::get('/shopkeeper/productdelete/{id}', 'ShopkeeperController@productdelete')->name('ShopkeeperController.productdelete');
	Route::get('/shopkeeper/pressyes/{id}','ShopkeeperController@pressyes');
	Route::get('/shopkeeper/pressno/{id}','ShopkeeperController@pressno');

	Route::get('/discount', 'ShopkeeperController@discount')->name('ShopkeeperController.discount');

	Route::get('/shopkeeper/pendingreq', 'ShopkeeperController@pendingreq')->name('ShopkeeperController.pendingreq');
	Route::get('/shopkeeper/productaccept/{id}/{cartid}', 'ShopkeeperController@productaccept')->name('ShopkeeperController.productaccept');
	Route::get('/shopkeeper/acceptyes/{id}/{cartid}', 'ShopkeeperController@acceptyes')->name('ShopkeeperController.acceptyes');

	Route::get('/shopkeeper/productreject/{id}/{cartid}', 'ShopkeeperController@productreject')->name('ShopkeeperController.productreject');
	Route::get('/shopkeeper/rejectyes/{id}/{cartid}', 'ShopkeeperController@rejectyes')->name('ShopkeeperController.rejectyes');

	Route::get('/shopkeeper/inventory', 'ShopkeeperController@inventory')->name('ShopkeeperController.inventory');
	
	Route::get('/shopkeeper/below', 'ShopkeeperController@below')->name('ShopkeeperController.below');
	Route::get('/shopkeeper/above', 'ShopkeeperController@above')->name('ShopkeeperController.above');
	Route::get('/shopkeeper/sidebardiscount', 'ShopkeeperController@sidebardiscount')->name('ShopkeeperController.sidebardiscount');
	
	
	Route::get('/shopkeeper/profile', 'ShopkeeperController@profile')->name('ShopkeeperController.profile');
	Route::get('/shopkeeper/editprofile', 'ShopkeeperController@editprofile')->name('ShopkeeperController.editprofile');
	Route::post('/shopkeeper/editprofile', 'ShopkeeperController@editedprofile');
	
	Route::get('/shopkeeper/contact', 'ShopkeeperController@contact')->name('ShopkeeperController.contact');
	
	Route::get('/shopkeeper/sidebar/{name}', 'ShopkeeperController@sidebar')->name('ShopkeeperController.sidebar');
	
});


