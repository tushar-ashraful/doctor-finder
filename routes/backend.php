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

Route::group( ['as' => 'backend.', 'prefix' => 'dashboard', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {

    Route::get( '/', 'DashboardController@index' )->name( 'dashboard' );


    // User routes
    Route::get( '/user/dataTable', 'user\UserController@dataTableUser' )->name( 'user.dataTable' );
    Route::resource( 'user', "user\UserController" )->scoped( ['user' => 'slug'] );

    // client Route
    Route::resource( '/clientlist', "client\ClientController" );
    Route::get( '/clientlist/delete/{clientlist}', 'client\ClientController@destroy' )->name( 'clientlist.delete' );

    // Route::group( [ 'namespace' => 'Project'], function () {
    //     require __DIR__.'/backend/project.php';
    //     require __DIR__.'/backend/work.php';
    // });
    // Route::group( [ 'namespace' => 'Workar'], function () {
    //     require __DIR__.'/backend/mywork.php';
    // });
    // Route::group( [ 'namespace' => 'University'], function () {
    //     require __DIR__.'/backend/university.php';
    // });
    Route::group( [ 'namespace' => 'Category'], function () {
        require __DIR__.'/backend/category.php';
    });
    Route::group( [ 'namespace' => 'Doctor'], function () {
        require __DIR__.'/backend/doctor.php';
    });

    Route::group( [ 'namespace' => 'Booking'], function () {
        require __DIR__.'/backend/booking.php';
    });

    Route::group( [ 'namespace' => 'Contact'], function () {
        require __DIR__.'/backend/contact.php';
    });
    

} );
