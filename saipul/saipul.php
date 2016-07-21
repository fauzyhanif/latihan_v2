<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$motivasi = DB::table('motivasis')
                ->inRandomOrder()
                ->first();
    return view('index', compact('motivasi'));
});

// authentication //
Route::auth();

// =============== ADMIN =============== //

// Dashboard //
Route::get('/dashboard', 'HomeController@index');
// --- End Dashboard --- //

// --- Profile Admin --- //
Route::get('/admin/profile', 'HomeController@profile');
Route::post('/admin/profile/foto', 'HomeController@upload');
Route::put('/admin/profile/{id}', 'HomeController@update');

// back up //
Route::get('/admin/profile/download/{id}', 'LaporanController@profile_admin_download');
Route::get('/admin/profile/print/{id}', 'LaporanController@profile_admin_print');
// --- End Profile Admin --- //

// --- Profile Pondok --- //
Route::get('/profile/{id}/profile', 'ProfileController@show');
Route::put('/profile/{id}/profile', 'ProfileController@update');
// --- Profile Pondok --- //

// =============== END ADMIN =============== //