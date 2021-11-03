<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Oner;
use App\Models\Book;
use App\Models\Event;
use App\Models\Cevent;
use App\Mail\Contact;
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


Auth::routes(['verify'=>true]);
// -----------------Route for auth
Route::group(['prefix' => LaravelLocalization::setLocale(), 
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('register/cevent','Auth\RegisterController@showRegistrationForm')->name('register.cevent');
Route::post('register/cevent','Auth\RegisterController@register')->name('register.cevent');
Route::get('register/oner','Auth\RegisterOnerController@showRegistrationForm')->name('register.oner');
Route::post('register/oner','Auth\RegisterOnerController@register')->name('register.oner');
Route::get('register','Auth\RegisterClientController@showRegistrationForm')->name('register.client');
Route::post('register','Auth\RegisterClientController@register')->name('register.client');
Route::any('logout','Auth\LoginController@logout')->name('logout');
Route::get('/redirect/{service}', 'SocialController@redirect');

Route::get('/callback/{service}', 'SocialController@callback');

// --------------Route Public
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/SomeVideoOfEvents', 'ViewerController@getvedios')->name('watch');
Route::get('/speaker', 'HomeController@speaker')->name('speaker');  
Route::get('/Contact',"HomeController@contact")->name('contact');
Route::post('/Contactsend',"HomeController@store")->name('contactsend');


// -------------Route for CLient or creator Event or owner space "Verified email"

Route::group(['middleware'=>'verified'],function () {

Route::get('/pay/{bookt}', 'HomeController@pay')->name('pay');
Route::resource('booking',"BookController");
Route::resource('Clientsatuts',"clientController");
Route::resource('bookingticket',"BookingtController");
Route::resource('CreatorEvents',"CeventController");
Route::resource('CreatorEvents/Events',"EventController");
Route::get('/home', 'HomeController@pagehome')->name('pagehome');
Route::resource('oner',"OnerController");
Route::post('/CEVENT/approve/{bookt}	','bookingtController@approve')->name('approve-book');
Route::post('/Owner/approve/{book}	','bookController@approve')->name('approve-booko');
Route::get('/search', 'HomeController@search')->name('search');
});
});