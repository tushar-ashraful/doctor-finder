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

Route::group( ['as' => 'website.', 'namespace' => 'Fontend'], function () {

    Route::get( '/', 'WebsiteController@index' )->name( 'index' );
    Route::get( '/doctors', 'WebsiteController@doctors' )->name( 'doctors' );
    Route::get( '/contactus', 'WebsiteController@contact' )->name( 'contactus' );
    Route::post( '/contactus', 'WebsiteController@contact_submit' )->name( 'contactus.submit' );
    Route::get( '/doctor-view/{id}', 'WebsiteController@doctorview' )->name( 'doctorview' );
    Route::get( '/checkout/{id}', 'WebsiteController@checkout' )->name( 'checkout' );
    Route::post( '/checkout/{id}', 'WebsiteController@checkout_submit' )->name( 'checkout.submit' );
    require __DIR__.'/doctor.php';
    require __DIR__.'/patient.php';

    
} );
