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

Route::get('/', 'homeController@show');

Route::get('/reservation', 'reservationController@show_res_create');
Route::post('/reservation/confirm', 'reservationController@createReservation');
Route::post('/reservation/info', 'reservationInfoController@showReservationInfo');
Route::post('/reservation/cancel', 'reservationController@cancelReservation');
Route::post('/reservation/start', 'reservationController@startReservation');
Route::post('/reservation/finish', 'reservationController@finishReservation');

Route::get('/specialist', 'specialistController@showSpecialistView')->middleware('auth');

Route::get('/logout', 'userController@logout');

Auth::routes();
