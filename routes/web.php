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

Route::get('/', 'LandingController@landing');

/**
 * In case application requires login and registration both
 * Auth::routes();
 *
 * If application donen't need registration set register to false
 */
Auth::routes(['register' => false]);

/**
 * All these routes are protected and requires login
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('designations', 'DesignationController');
    Route::resource('staff_members', 'StaffMemberController');
});

/**
 * These routes are not public (donn't required login)
 */
