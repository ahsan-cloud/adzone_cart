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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','UsersController@index');

Auth::routes();
    
Route::get('/home', 'HomeController@index')->name('home');
Route::post('UsersController/fetch','UsersController@fetch')->name('searchlocation.fetch');
//For Displaying cities name below text box
Route::post('UsersController/cities','UsersController@cities')->name('state.cities');
//For fetching main categories and displaying them inside the dropdown 
Route::post('UsersController/retrieve','UsersController@retrieve')->name('categories.retrieve');
//To Display Add Post Category page
Route::get('post-classified-ad','UsersController@adpost');
//To display various views when category clicked
Route::get('/post-classified-ad/{maincategory}/{id}','UsersController@categories');
//To display and post ad
Route::post('/postCarsBikes','UsersController@postCarsBikes');
//To display all advertisement
Route::get('UsersController/getAds','UsersController@getAds')->name('categories.ads');
//To display post or publish ad
Route::get('/viewAds/{maincategory}/{id}','UsersController@viewAds');
//To search product functionality
Route::post('/search/product/','UsersController@searchProduct');
//To search ads by city and product category
Route::post('/search/advertisement','UsersController@searchAdvertisement')->name('yahan-pos-hoja');
//To Display All Product Detail
Route::get('/product/view/{id}','UsersController@getProductDetail');