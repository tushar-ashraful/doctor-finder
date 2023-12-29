<?php 
Route::get( '/doctor/register', 'DoctorController@register' )->name( 'doctor.register' );
Route::post( '/doctor/register', 'DoctorController@register_submit' )->name( 'doctor.register.submit' );

Route::get( '/doctor/login', 'DoctorController@login' )->name( 'doctor.login' );
Route::post( '/doctor/login', 'DoctorController@login_submit' )->name( 'doctor.login.submit' );

Route::get( '/doctor/dashboard', 'DoctorController@dashboard' )->name( 'doctor.dashboard' );

Route::get( '/doctor/chat/{chat}', 'DoctorController@chat' )->name( 'doctor.chat' );
Route::post( '/doctor/chat/{chat}', 'DoctorController@chat_submit' )->name( 'doctor.chat.submit' );
Route::get( '/doctor/chatajax/{chat}', 'DoctorController@chat_ajax' )->name( 'doctor.chat.ajax' );

// Route::get( '/doctor/logout', function () {
// 	session()->forget( 'doctor');
// 	return redirect('/')->with('success','logout Success');
// })->name('doctor.appointment');



Route::get( '/doctor/appointment', 'DoctorController@appointment' )->name('doctor.appointment');
Route::get( '/doctor/appointment/accept/{id}', 'DoctorController@appointment_accept' )->name('doctor.appointment.accept');
Route::get( '/doctor/appointment/cancel/{id}', 'DoctorController@appointment_cancel' )->name('doctor.appointment.cancel');
Route::get( '/doctor/appointment/prescription/{booking}', 'DoctorController@prescription' )->name('doctor.appointment.prescription');
Route::post( '/doctor/appointment/prescription/{booking}', 'DoctorController@prescription_submit' )->name('doctor.appointment.prescription_submit');

Route::get( '/doctor/profile', 'DoctorController@profile' )->name('doctor.profile');
Route::post( '/doctor/profile', 'DoctorController@profile_update' )->name('doctor.profile.update');


Route::get( '/doctor/patients', function () {
	return view('fontend.doctor.patients');
} )->name('doctor.patients');

Route::get( '/doctor/invoices', function () {
	return view('fontend.doctor.invoices');
} )->name('doctor.invoices');

Route::get( '/doctor/invoices-view', function () {
	return view('fontend.doctor.invoices-view');
} )->name('doctor.invoices-view');