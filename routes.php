<?php

use Mohsin\Txt\Models\Setting;

Route::get('robots.txt', function (){
    if(!Setting::get('use_robots'))
    	return Redirect::to('/');
    return "This is robots.txt. Yet to be implemented";
});

Route::get('humans.txt', function (){
    if(!Setting::get('use_humans'))
    	return Redirect::to('/');
    return 'This is humans.txt. Yet to be implemented';
});