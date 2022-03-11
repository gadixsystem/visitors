<?php
if (config('visitors.dashboard')) {
    Route::group(['namespace' => 'gadixsystem\visitors\Http\Controllers', 'middleware' => config('visitors.middleware'), 'prefix' => config('visitors.prefix')], function () {

        Route::get('/', 'VisitorsController@index')->name('visitors.index');
        Route::get('/status', 'VisitorsController@status')->name('visitors.status');
        Route::get('/details', 'VisitorsController@details')->name('visitors.historic');
        Route::get('/{id}', 'VisitorsController@details');
        Route::post('/searh', 'VisitorsController@search')->name('visitors.search');
        Route::post('/{id}', 'VisitorsController@blockIP');

        // Status routes
        Route::get('/status/today', 'VisitorsController@today')->name('visitors.today');
        Route::get('/status/total', 'VisitorsController@total')->name('visitors.total');
        Route::get('/status/active', 'VisitorsController@active')->name('visitors.active');
        Route::get('/status/blocked', 'VisitorsController@blocked')->name('visitors.blocked');
        Route::get('/status/graphic', 'VisitorsController@graphic')->name('visitors.graphic');
    });
}
