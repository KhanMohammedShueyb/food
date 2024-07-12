<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ApiAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('Verify', function () {
//     return view('email_templates.test-email');
// });
Route::get('phpinfo', function () {
    return view('phpinfo');
});
// Auth::routes(['verify' => true]);
Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');

// Route::get('/signup', 'HomeController@index')->name('welcome');


// Route::get('/confirm_password', function () {
//     return view('form');
// });
// Route::get('/verifyemail/{verification_code}', ['as' => '', 'uses' => 'ApiAuthController@verifyemail'])->name('verifyemail');
// Route::get('/confirm_password', ['as' => '', 'uses' => 'ApiAuthController@confirmPassword'])->name('confirm_password');
// Route::get('/reset_password', function(){
//     return View('email_templates.reset_password_form');
//  });
// Route::get('/confirm_password', function () {
//     return view('email_templates.reset_password_form');