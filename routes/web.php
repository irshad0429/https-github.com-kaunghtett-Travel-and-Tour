
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
    return view('web.main');
});

Route::get('/mighty-admin', function () {

   
    return view('auth.login');
});

//Auth

Route::get('mighty-admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('mighty-admin', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login', 'Auth\LoginController@LoginForm');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function(){

		return view('/dashboard');
})->middleware('auth');

// category//
Route::resource('/category', 'Admin\ToursController');


//blog//

Route::get('/blogs', 'Admin\BlogsController@index');

Route::get('/blogs/create', 'Admin\BlogsController@create');

Route::post('/blogs', 'Admin\BlogsController@store');

Route::get('/blogs/{blogs}/edit', 'Admin\BlogsController@edit');

Route::post('/blogs/{blogs}/update', 'Admin\BlogsController@update');

Route::get('/blogs/{blogs}/show', 'Admin\BlogsController@show');

Route::post('/blogs/destroy/{blogs}', 'Admin\BlogsController@destroy');

// Route::get('/blogs/{blogs}/post', 'Admin\BlogsController@post');

//Tour Package//

Route::get('/packages', 'Admin\TourPackagesController@index');

Route::get('/packages/create', 'Admin\TourPackagesController@create');

Route::post('/packages', 'Admin\TourPackagesController@store');

Route::get('/packages/{packages}/edit', 'Admin\TourPackagesController@edit');

Route::post('/packages/{packages}/update', 'Admin\TourPackagesController@update');

Route::get('/packages/{packages}/show', 'Admin\TourPackagesController@show');

Route::post('/packages/{packages}/destroy', 'Admin\TourPackagesController@destroy');

//Gallery

Route::get('/gallery/{gallery}', 'Admin\TourPackagesController@gallery');

Route::get('/gallery/{gallery}/addnew', 'Admin\TourPackagesController@addnew');

Route::post('/gallery/{packages}', 'Admin\TourPackagesController@upload');

Route::get('/deletegallery/{id}', 'Admin\TourPackagesController@deleteattachment');

//User//

Route::get('/users', 'Admin\UsersController@index');

Route::get('/users/create', 'Admin\UsersController@create');

Route::post('/users', 'Admin\UsersController@store');

Route::get('/users/{users}/edit', 'Admin\UsersController@edit');

Route::post('/users/{users}/update', 'Admin\UsersController@update');

Route::get('/users/{users}/profile', 'Admin\UsersController@profile');

Route::post('/users/{users}/upgrade', 'Admin\UsersController@upgrade');

Route::get('/users/{users}/show', 'Admin\UsersController@show');

Route::post('/users/{users}/destory', 'Admin\UsersController@destory');

//Nav User Setting

Route::get('/usersetting', 'Admin\UsersettingController@setting');

Route::post('/usersetting/update', 'Admin\UsersettingController@update');

//Our Teams

Route::get('/ourteam', 'Web\OurteamControllers@team');

Route::get('/admin/team', 'Web\OurteamControllers@index');

Route::get('/ourteam/create', 'Web\OurteamControllers@create');

Route::post('/admin/team', 'Web\OurteamControllers@store');

Route::get('/ourteam/edit/{ourteam}', 'Web\OurteamControllers@edit');

Route::post('/ourteam/update/{ourteam}', 'Web\OurteamControllers@update');

Route::get('/ourteam/{ourteam}/show', 'Web\OurteamControllers@show');

Route::post('/ourteam/{ourteam}/destroy', 'Web\OurteamControllers@destroy');

// Member Category

Route::get('/membercategory', 'Admin\MemberCategoriesControllers@index');

Route::get('/membercategory/create', 'Admin\MemberCategoriesControllers@create');

Route::get('/membercategory/{membercategory}/edit', 'Admin\MemberCategoriesControllers@edit');

Route::post('/membercategory', 'Admin\MemberCategoriesControllers@store');

Route::post('/membercategory/{membercategory}', 'Admin\MemberCategoriesControllers@update');


//

//Location

Route::get('/locations', 'Admin\LocationsController@index');

Route::get('/locations/create', 'Admin\LocationsController@create');

Route::post('/locations', 'Admin\LocationsController@store');

Route::get('/locations/{locations}/edit', 'Admin\LocationsController@edit');

Route::post('/locations/{locations}/update', 'Admin\LocationsController@update');




//Schedule//

Route::get('/schedules/{schedules}', 'Admin\TourSchedulesController@index');

Route::get('/schedules/{schedules}/create', 'Admin\TourSchedulesController@create');

Route::post('/schedules/{packages}', 'Admin\TourSchedulesController@store');

Route::get('/schedules/edit/{schedules}', 'Admin\TourSchedulesController@edit');

Route::post('/schedules/update/{schedules}', 'Admin\TourSchedulesController@update');

Route::get('/schedules/show/{schedules}', 'Admin\TourSchedulesController@show');
Route::get('/schedules/showdel/{schedules}', 'Admin\TourSchedulesController@showdel');


Route::post('/schedules/destroy/{schedules}', 'Admin\TourSchedulesController@destroy');

Route::get('/deleteimage/{id}', 'Admin\TourSchedulesController@deleteattachment');

//TourLeader//

Route::get('/tourleaders', 'Admin\TourLeadersController@index');

Route::get('/tourleaders/create', 'Admin\TourLeadersController@create');

Route::post('/tourleaders', 'Admin\TourLeadersController@store');

Route::get('/tourleaders/{tourleaders}', 'Admin\TourLeadersController@edit');

Route::post('/tourleaders/{tourleaders}/update', 'Admin\TourLeadersController@update');

Route::get('/tourleaders/show/{tourleaders}', 'Admin\TourLeadersController@show');

Route::post('/tourleaders/destroy/{tourleaders}', 'Admin\TourLeadersController@destroy');

//Destinations

Route::get('/admin/destinations', 'Admin\DestinationsController@index');

Route::get('/admin/destinations/create', 'Admin\DestinationsController@create');

Route::post('/admin/destinations', 'Admin\DestinationsController@store');

Route::get('/admin/destinations/{destinations}', 'Admin\DestinationsController@edit');

Route::post('/admin/destinations/{destinations}/update', 'Admin\DestinationsController@update');

Route::get('/admin/destinations/{destinations}/show', 'Admin\DestinationsController@show');

Route::post('/admin/destinations/{destinations}/destroy', 'Admin\DestinationsController@destroy');

// Destinations Gallery

Route::get('/admin/destinations-gallery/{destinations}', 'Admin\DestinationsController@gallery');

Route::get('/admin/destinations-gallery/{destinations}/addnew', 'Admin\DestinationsController@addnew');

Route::post('/admin/destinations-gallery/{destinations}', 'Admin\DestinationsController@upload');

Route::get('/removeimg/{id}', 'Admin\DestinationsController@deleteattachment');

// Testimonial

Route::get('/testimonial', 'Admin\TestimonialsControllers@index');

Route::get('/testimonial/create', 'Admin\TestimonialsControllers@create');

Route::post('/testimonial', 'Admin\TestimonialsControllers@store');

Route::get('/testimonial/edit/{testimonial}', 'Admin\TestimonialsControllers@edit');

Route::post('/testimonial/update/{testimonial}', 'Admin\TestimonialsControllers@update');

Route::get('/testimonial/show/{testimonial}', 'Admin\TestimonialsControllers@show');

Route::post('/testimonial/destroy/{testmonial}', 'Admin\TestimonialsControllers@destroy');






// FrontEnd //

Route::get('/','Web\HomePageController@index');

// Review
Route::get('/admin/reviews', 'Web\ReviewControllers@index')->middleware('auth');


Route::get('/tour-package', 'Web\PackageControllers@index');

Route::get('/tour-details/{id}', 'Web\TourdetailsController@index');
Route::post('/tour-details/{id}/review', 'Web\ReviewControllers@store');

Route::get('/destinations-details/{id}', 'Web\DestinationsdetailsController@index');



Route::get('/destination', 'Web\TourDestinationControllers@index');

Route::get('/blog', 'Web\TourBlogsControllers@index');

Route::get('/blog-inner/{id}', 'Web\BlogsdetailsControllers@index');

// booking
Route::get('/booking', 'Web\BookingControllers@index')->middleware('auth');
Route::get('/booking/{id}', 'Web\BookingControllers@booking');
Route::post('/booking/store', 'Web\BookingControllers@store');
Route::get('/booking/edit/{id}','Web\BookingControllers@edit')->middleware('auth');
Route::post('/booking/{id}/update/','Web\BookingControllers@update')->middleware('auth');
//

Route::get('/dashboard', 'Web\ContactusControllers@index')->middleware('auth');

Route::get('/contact-us', 'Web\ContactusControllers@create'); 

Route::post('/contact-us/store', 'Web\ContactusControllers@store');


Route::get('/about-us', function() {

    return view('web.about-us');

});

//login and logout



