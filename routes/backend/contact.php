<?php 
// Route::resource( '/doctor', "DoctorController" );
Route::get( '/contact', 'ContactController@index' )->name( 'contact.index' );
// Route::get( '/doctor/delete/{doctor}', 'DoctorController@destroy' )->name( 'doctor.delete' );
// Route::get( '/work/uncomplete/{work}', 'WorkController@uncomplete' )->name( 'work.uncomplete' );