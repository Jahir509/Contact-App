<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Resourcefull Route
// Route::resource('/contacts' , 'ContactController')->only(['index','show']);
Route::resources([
    '/companies' => 'CompanyController' ,
    '/contacts' => 'ContactController'
]);


/***This the method of routing using Function***/

//Route::get('/contacts',function(){
//    return view('contacts.index');
//})->name('contacts.index');

/***This the method of routing using Controller ***/
// Route::get('/contacts','ContactController@index')->name('contacts.index');
// Route::post('/contacts','ContactController@store')->name('contacts.store');
// Route::get('/contacts/create','ContactController@create')->name('contacts.create');
// Route::get('/contacts/{contact}','ContactController@show')->name('contacts.show');
// Route::get('/contacts/edit/{contact}','ContactController@edit')->name('contacts.edit');
// Route::put('/contacts/{contact}','ContactController@update')->name('contacts.update');
// Route::delete('/contacts/{contact}','ContactController@delete')->name('contacts.delete');



// Added by authentication
Auth::routes(['verify' => true]); // this portion ['verify' => true] is addedd for verify email

Route::get('/home', 'HomeController@index')->name('home');

//
Route::get('/settings/account','Settings\AccountController@index');
Route::get('/settings/profile','Settings\ProfileController@edit')->name('settings.profile.edit');
Route::put('/settings/profile','Settings\ProfileController@update')->name('settings.profile.update');
