<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustAuthController;
use App\Http\Controllers\EventsController;

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




//registration route 
Route::get('/registration', [CustAuthController::class, 'registration']);
//post user
Route::post('/register_user', [CustAuthController::class, 'registerUser'])->name('register_user');

//login route
Route::get('/login', [CustAuthController::class, 'login']);
Route::post('/user_login', [CustAuthController::class, 'userLogin'])->name('user_login');


Route::get('/dashboard', [CustAuthController::class, 'dashboard']);
Route::get('/logout', [CustAuthController::class, 'logout'])->name('logout');
//

//Events
Route::get('/eventform', [EventsController::class, 'eventform']);
Route::post('/register_event',[EventsController::class, 'registerEvent'])->name('register_event');