<?php

# Logs
Route::get('login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::resource('session', 'SessionController');

Route::group(array('before'=>'auth'), function() {
    Route::get('/', array('as' => 'home', 'uses'=>'ProjectController@index'));
    # Projects
    Route::resource('project', 'ProjectController');

    # Reports
    Route::resource('report', 'ReportController');
});

# Admin !
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function() {
    Route::resource('project', 'AdminProjectController');
    Route::resource('feature', 'AdminFeatureController');
    Route::resource('version', 'AdminVersionController');
    Route::resource('user', 'AdminUserController');
});