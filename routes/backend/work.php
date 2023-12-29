<?php 
Route::resource( '/work', "WorkController" );
Route::get( '/work/complete/{work}', 'WorkController@complete' )->name( 'work.complete' );
Route::get( '/work/uncomplete/{work}', 'WorkController@uncomplete' )->name( 'work.uncomplete' );