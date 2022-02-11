<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Crud\Generator\Http\Controllers'],function(){
    Route::get('/crud','GeneratorController@index')->name('crud');

Route::post('crud','GeneratorController@generate')->name('crud');

});

