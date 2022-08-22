<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/** 
Possibles errors del Rover
· Aterra sobre un obstacle
· Topa amb un obstacle
· Se surt del Board


Dubtes:
Si surt per un costat entra per l'altre?
Com s'ha de representar?
Girar a la dreta vol dir rotar, o rotar i avançar?


 */

Route::get('/', 'MarsRoverController@index')->name('index');

Route::post('/', 'MarsRoverController@run')->name('run');