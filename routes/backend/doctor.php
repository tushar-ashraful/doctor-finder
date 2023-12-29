<?php 
// Route::resource( '/doctor', "DoctorController" );
Route::get( '/doctors', 'DoctorController@index' )->name( 'doctor.index' );
Route::get( '/doctor/{doctor}', 'DoctorController@view' )->name( 'doctor.view' );
Route::get( '/doctors/approved/{doctor}', 'DoctorController@approved' )->name( 'doctor.approved' );
// Route::get( '/doctor/delete/{doctor}', 'DoctorController@destroy' )->name( 'doctor.delete' );
// Route::get( '/work/uncomplete/{work}', 'WorkController@uncomplete' )->name( 'work.uncomplete' );