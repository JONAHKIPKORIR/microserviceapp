<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustAuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CalendarController;

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

Route::get('/welcome', function () {
    return view('welcome');
});




//registration route 
Route::get('/registration', [CustAuthController::class, 'registration'])->name('registration');
//post user
Route::post('/register_user', [CustAuthController::class, 'registerUser'])->name('register_user');

//login route
Route::get('/', [CustAuthController::class, 'login'])->name('login');
Route::post('/user_login', [CustAuthController::class, 'userLogin'])->name('user_login');


Route::get('/home', [CustAuthController::class, 'home'])->name('home')->name('home');
Route::get('/logout', [CustAuthController::class, 'logout'])->name('logout');
//

//Events
Route::get('/eventform', [EventsController::class, 'eventform'])->middleware('auth');
Route::post('/register_event',[EventsController::class, 'registerEvent'])->name('register_event');

Route::get('/calenda', [CalendarController::class, 'calenda'])->name('calenda');
Route::get('/calendar', [CalendarController::class, 'calendarEvents'])->name('calendar');