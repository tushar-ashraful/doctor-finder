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


Route::get( '/logout', function () {
    auth()->logout();
    return redirect('/login');
} );

Route::get( '/website/logout', function () {
    if ( session()->has( 'doctor' ) ) {

        session()->remove( 'doctor' );
        return redirect( '/' )->with('success','logout Success');

    }else if ( session()->has( 'patient' ) ) {

        session()->remove( 'patient' );
        return redirect( '/' )->with('success','logout Success');

    } else {
        session()->flash( 'error', 'your are no login' );
        return redirect()->back();
    }
} )->name('website.logout');

Route::get( '/aboutus', function () {
    return view('fontend.about');
} )->name('aboutus');



// Route::get( '/', function () {
//     return redirect('/login');
// } );

Route::get( '/clear', function () {
    // Artisan::call('cache:clear');
    // Artisan::call('config:clear');
    // Artisan::call('config:cache');
    // Artisan::call('view:clear');
    // Artisan::call('migrate');
    // Artisan::call('storage:link');
    // Artisan::call('db:seed --class=RoleSeeder');
    // Artisan::call('db:seed --class=ItemSeeder');
    // Artisan::call('db:seed --class=UniversitySeeder');
    // Artisan::call('db:seed --class=OrderSeeder');
} );

// Route::get( '/dashboard', function () {
//     return view( 'dashboard' );
// } )->middleware( ['auth'] )->name( 'dashboard' );

require __DIR__.'/auth.php';
require __DIR__.'/fontend/website.php';