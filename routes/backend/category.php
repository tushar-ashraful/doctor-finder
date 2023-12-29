<?php 
Route::resource( '/category', "CategoryController" );
Route::get( '/category/delete/{category}', 'CategoryController@destroy' )->name( 'category.delete' );
// Route::get( '/work/uncomplete/{work}', 'WorkController@uncomplete' )->name( 'work.uncomplete' );