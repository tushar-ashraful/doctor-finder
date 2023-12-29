<?php

// project Route
	Route::resource( '/project', "ProjectController" );
	Route::get( '/project/invoice/{project}', "ProjectController@invoice" )->name('project.invoice');

    // project upgrade and Correction route
	Route::post( '/project/upgrade/{project}', "ProjectController@project_upgrade" )->name('project.project_upgrade');

	// project upgrade and Correction route
	Route::post( '/project/return/{project}', "ProjectController@return_cancel" )->name('project.return_cancel');

    // item edit route
	Route::post( '/project/item/edit/{project}', "ProjectController@orderItem_edit" )->name('project.orderItem_edit');
	Route::delete( '/project/item/delete/{orderItem}', "ProjectController@orderItem_delete" )->name('project.orderItem_delete');

    // project payment get_payment, update and delete route
	Route::post( '/project/installment/{project}', "ProjectController@installment_pay" )->name('project.installment_pay');
	Route::post( '/project/payment/update/{project}', "ProjectController@payment_update" )->name('project.payment_update');
	Route::delete( '/project/payment/delete/{orderPay}', "ProjectController@payment_delete" )->name('project.payment_delete');

	// project status 
	Route::post( '/project/status/change/{project}', "ProjectController@status_change" )->name('project.status_change');

	// Project Notice  
	Route::post( '/project/note/{project}', "ProjectController@note" )->name('project.note');

