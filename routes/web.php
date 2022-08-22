<?php

Route::get('/', 'MarsRoverController@index')->name('index');

Route::post('/run', 'MarsRoverController@run')->name('run');