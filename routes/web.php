<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    // Dashboard Routes...
    Route::get('/all', 'DashboardController@index')->name('viewdit.index');

    Route::get('/audit_log/{audit}', 'DashboardController@show')->name('viewdit.audit_log.show');

});

// Catch-all Route...
Route::get('/{view?}', 'HomeController@index')->where('view', '(.*)')->name('viewdit.index');
