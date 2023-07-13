<?php

Route::group(['namespace' => 'Api','prefix' => 'api-ptp'], function(){
    Route::get('','ApiDashboardController@index');
});
