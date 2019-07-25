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

Route::get('/', function () {
    return view('frontEnd.index');
});



/*
|--------------------------------------------------------------------------
| FrontEnd Start
|--------------------------------------------------------------------------
*/

/*home/index/Root:*/
Route::get('/','frontendController@index')->name('home');
/*Search:*/
Route::post('search','frontendController@search_index')->name('search');
/*Booking:*/
Route::post('booking','frontendController@booking')->name('booking_store');
/*Payment Stripe:*/
Route::get('payment/{id}','frontendController@payment')->name('payment');
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'frontendController@postPaymentWithStripe'));
/*Cash*/
Route::post('cash','frontendController@cash')->name('cash');
/*User Account:*/
Route::get('account','frontendController@account')->name('account');
Route::get('user-login','frontendController@login')->name('user-login');
Route::post('user-login-action','Auth\LoginController@login')->name('user-login-action');
Route::post('user-login-action2','Auth\LoginController@login2')->name('user-login-action2');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('user-registration','frontendController@registration')->name('user-registration');

/*Pages:*/
Route::get('about','frontendController@about')->name('frontend-about');
Route::get('room','frontendController@room')->name('frontend-room');
Route::get('room_details/{id}','frontendController@room_details')->name('frontend-room_details');
Route::get('facilities','frontendController@facilities')->name('frontend-facilities');
Route::get('dinning','frontendController@dinning')->name('frontend-dinning');
Route::get('meeting','frontendController@meeting')->name('frontend-meeting');
Route::get('gallery','frontendController@gallery')->name('frontend-gallery');
Route::get('contact','frontendController@contact')->name('frontend-contact');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'frontendController@contactUSPost']);

//   Category:
Route::get('categories','AdminController@categories')->name('categories');
Route::post('category_store','AdminController@category_store')->name('category_store');
Route::post('category_update/{id}','AdminController@category_update')->name('category_update');
Route::get('category_destroy/{id}','AdminController@category_destroy')->name('category_destroy');

/*
|--------------------------------------------------------------------------
| Admin Authentication Start
|--------------------------------------------------------------------------
*/
Route::get('login','Auth\AdminLoginController@LoginForm')->name('login');
Route::get('admin-signup','AdminController@create')->name('admin-signup');
Route::post('admin-store','AdminController@store')->name('admin-store');
Route::post('admin-login','Auth\AdminLoginController@login')->name('admin-login');
Route::get('admin-logout','Auth\AdminLoginController@logout')->name('admin-logout');
/*
|--------------------------------------------------------------------------
| Admin Authentication End
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Admin Start
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard','AdminController@index')->name('dashboard');
//    Resource For Patch method:
    Route::resource('patch','AdminController');

    //   Logo Dynamic:
    Route::get('logo','AdminController@addlogo')->name('logo');
    Route::post('storelogo','AdminController@storelogo')->name('storelogo');
    Route::get('logo-index','AdminController@alllogo')->name('logo-index');
    Route::get('deletelogo/{id}','AdminController@deletelogo')->name('deletelogo');
    //   Slider Dynamic:
    Route::get('slider-index','AdminController@allslider')->name('slider-index');
    Route::get('editslider/{id}','AdminController@editslider')->name('editslider');
    Route::post('updateslider/{id}','AdminController@updateslider')->name('updateslider');
    Route::get('deleteslider/{id}','AdminController@deleteslider')->name('deleteslider');
    Route::get('slider','AdminController@addslider')->name('slider');
    Route::post('storeslider','AdminController@storeslider')->name('storeslider');
    //   Testimonial \ Dynamic:
    Route::get('testimonial-index','AdminController@allslider2')->name('slider2-index');
    Route::get('testimonial/{id}','AdminController@editslider2')->name('editslider2');
    Route::post('updateslider2/{id}','AdminController@updateslider2')->name('updateslider2');
    Route::get('deletetestimonial/{id}','AdminController@deleteslider2')->name('deleteslider2');
    Route::get('testimonial','AdminController@addslider2')->name('slider2');
    Route::post('storeslider2','AdminController@storeslider2')->name('storeslider2');
//Dinning & Restaurant
    Route::get('dinning-index','AdminController@allslider3')->name('slider3-index');
    Route::get('dinning/{id}','AdminController@editslider3')->name('editslider3');
    Route::post('updateslider2/{id}','AdminController@updateslider3')->name('updateslider3');
    Route::get('deletetedinning/{id}','AdminController@deleteslider3')->name('deleteslider3');
    Route::get('dinning','AdminController@addslider3')->name('slider3');
    Route::post('storeslider3','AdminController@storeslider3')->name('storeslider3');
    //   Image Dynamic:
    Route::get('img-index','AdminController@allimg')->name('img-index');
    Route::get('editimg/{id}','AdminController@editimg')->name('editimg');
    Route::post('updateimg/{id}','AdminController@updateimg')->name('updateimg');
    Route::get('deleteimg/{id}','AdminController@deleteimg')->name('deleteimg');
    Route::get('img','AdminController@addimg')->name('img');
    Route::post('storeimg','AdminController@storeimg')->name('storeimg');

//   Contact Dynamic:
    Route::get('contactinfo','AdminController@contactinfo_create')->name('contactinfo');
    Route::get('contactinfo-index','AdminController@contactinfo')->name('contactinfo-index');
    Route::patch('contactinfo_store','AdminController@contactinfo_store')->name('contactinfo_store');
    //   Counter Dynamic:
    Route::get('counter','AdminController@counter_create')->name('counter');
    Route::get('counter-index','AdminController@counter')->name('counter-index');
    Route::patch('counter_store','AdminController@counter_store')->name('counter_store');
    //   Social Dynamic:
    Route::get('social','AdminController@social_create')->name('social');
    Route::get('social-index','AdminController@social')->name('social-index');
    Route::patch('social_store','AdminController@social_store')->name('social_store');
    //   Gallery Dynamic:
    Route::get('gallery-index','AdminController@allgallery')->name('gallery-index');
    Route::get('editgallery/{id}','AdminController@editgallery')->name('editgallery');
    Route::post('updategallery/{id}','AdminController@updategallery')->name('updategallery');
    Route::get('deletegallery/{id}','AdminController@deletegallery')->name('deletegallery');
    Route::get('gallery','AdminController@addgallery')->name('gallery');
    Route::post('storegallery','AdminController@storegallery')->name('storegallery');
    //   About Dynamic:
    Route::get('about','AdminController@about_create')->name('about');
    Route::patch('about_store','AdminController@about_store')->name('about_store');
    //   Dinning Dynamic:
    Route::get('dinning','AdminController@dinning_create')->name('dinning');
    Route::patch('dinning_store','AdminController@dinning_store')->name('dinning_store');
    //   Meeting Dynamic:
    Route::get('meeting','AdminController@meeting_create')->name('meeting');
    Route::patch('meeting_store','AdminController@meeting_store')->name('meeting_store');
    //   Room Dynamic:
    Route::get('room','AdminController@room_create')->name('room');
    Route::get('rooms','AdminController@rooms')->name('rooms');
    Route::post('room_store','AdminController@room_store')->name('room_store');
    Route::get('room_edit/{id}','AdminController@room_edit')->name('room_edit');
    Route::post('room_update/{id}','AdminController@room_update')->name('room_update');
    Route::get('room_destroy/{id}','AdminController@room_destroy')->name('room_destroy');
    //   Facility Dynamic:
    Route::get('facility','AdminController@facility_create')->name('facility');
    Route::get('facilities','AdminController@facilities')->name('facilities');
    Route::post('facility_store','AdminController@facility_store')->name('facility_store');
    Route::get('facility_edit/{id}','AdminController@facility_edit')->name('facility_edit');
    Route::post('facility_update/{id}','AdminController@facility_update')->name('facility_update');
    Route::get('facility_destroy/{id}','AdminController@facility_destroy')->name('facility_destroy');

    Route::get('facilitySingle','AdminController@facilitySingle_create')->name('facilitySingle');
    Route::patch('facilitySingle_store','AdminController@facilitySingle_store')->name('facilitySingle_store');
    //   Copyright Dynamic:
    Route::get('copyright','AdminController@copyright_create')->name('copyright');
    Route::patch('copyright_store','AdminController@copyright_store')->name('copyright_store');

/*Users:*/
    Route::get('users','AdminController@users')->name('users');
    Route::get('user_destroy/{id}','AdminController@user_destroy')->name('user_destroy');

/*Booking:*/
    Route::get('bookings','AdminController@bookings')->name('bookings');
    Route::get('booking_destroy/{id}','AdminController@booking_destroy')->name('booking_destroy');
    Route::get('booking_active/{id}/{room}/{result}','AdminController@booking_active')->name('booking_active');
    Route::get('booking_deactive/{id}','AdminController@booking_deactive')->name('booking_deactive');
    Route::get('booking_update/{id}','AdminController@bookingUpdate')->name('bookingUpdate');

    Route::get('booking_close/{id}/{room}/{add}','AdminController@booking_close')->name('booking_close');

/*Card Payment Online Stripe:*/
    Route::get('payment','AdminController@payments')->name('payments');
    Route::get('payment_destroy/{id}','AdminController@payment_destroy')->name('payment_destroy');

/*    Cash Request booking:*/
    Route::get('cashes','AdminController@cashes')->name('cashes');
    Route::get('cash_destroy/{id}','AdminController@cash_destroy')->name('cash_destroy');
    Route::get('cash_receive/{id}/{booking}','AdminController@cash_receive')->name('cash_receive');

/*    Expenses:*/
    Route::get('expenses','AdminController@expenses')->name('expenses');
    Route::post('expense_store','AdminController@expense_store')->name('expense_store');
    Route::post('expense_update/{id}','AdminController@expense_update')->name('expense_update');
    Route::get('expense_destroy/{id}','AdminController@expense_destroy')->name('expense_destroy');

/*Statements:*/
    Route::get('statements','AdminController@statements')->name('statements');
    Route::post('statement','AdminController@statement')->name('statement');


});
/*
|--------------------------------------------------------------------------
| Admin End
|--------------------------------------------------------------------------
*/







Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});
