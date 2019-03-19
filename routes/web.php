<?php

Route::get('/', function()
{
	return redirect()->route('home');
});

Route::get('/home', 'HomeController')->name('home');
Route::get('/test', 'HomeController@test')->name('test');