<?php 
// Route::resource( '/doctor', "DoctorController" );
Route::get( '/booking', 'BookingController@index' )->name( 'booking.index' );
// Route::get( '/booking/{booking}', 'BookingController@view' )->name( 'booking.view' );
Route::get( '/booking/approved/{booking}', 'BookingController@approved' )->name( 'booking.approved' );
// Route::get( '/doctor/delete/{doctor}', 'DoctorController@destroy' )->name( 'doctor.delete' );
// Route::get( '/work/uncomplete/{work}', 'WorkController@uncomplete' )->name( 'work.uncomplete' );