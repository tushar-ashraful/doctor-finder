<?php 
Route::get( '/patient/register', 'PatientController@register' )->name( 'patient.register' );
Route::post( '/patient/register', 'PatientController@register_submit' )->name( 'patient.register.submit' );

Route::get( '/patient/login', 'PatientController@login' )->name( 'patient.login' );
Route::post( '/patient/login', 'PatientController@login_submit' )->name( 'patient.login.submit' );


Route::get( '/patient/dashboard', 'PatientController@dashboard' )->name( 'patient.dashboard' );

Route::get( '/patient/profile', 'PatientController@profile' )->name( 'patient.profile' );
Route::post( '/patient/profile', 'PatientController@profile_update' )->name( 'patient.profile.update' );

Route::get( '/patient/chat/{chat}', 'PatientController@chat' )->name( 'patient.chat' );
Route::post( '/patient/chat/{chat}', 'PatientController@chat_submit' )->name( 'patient.chat.submit' );
Route::get( '/patient/chatajax/{chat}', 'PatientController@chat_ajax' )->name( 'patient.chat.ajax' );

Route::get( '/patient/prescription/{booking}', 'PatientController@prescription' )->name( 'patient.prescription' );