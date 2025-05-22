<?php

use App\Http\Controllers\FormDataController;

/**
 * Application routes.
 */


Route::group([
        'prefix' =>'registros', 
        'controller' => FormDataController::class,
        'middleware' => ['auth.admin'],
        'as' => 'formdata.'
    ], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{formData}/edit', 'edit')->name('edit');
    Route::put('/{formData}', 'update')->name('update')->middleware('validate.formData');
    Route::delete('/{formData}', 'destroy')->name('destroy')->middleware('validate.formData');
});

Route::get('/', function () {
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        if (in_array('administrator', (array) $user->roles)) {
            return redirect()->route('formdata.index');
        }
    }
    return view('welcome');
});





