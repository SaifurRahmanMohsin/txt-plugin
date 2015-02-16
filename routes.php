<?php

use Cms\Classes\Page;
use Mohsin\Txt\Models\Robot;
use Mohsin\Txt\Models\Human;
use Mohsin\Txt\Models\Setting;
//http://localhost/sample/robots.txt
Route::get('robots.txt', function (){
    if(!Setting::get('use_robots'))
    	return Redirect::to(Page::url(Setting::get('redirectpage')));
    return Response::make(Robot::first()->generateTxt(), 200, array('Content-Type' => 'text/plain'));
});

Route::get('humans.txt', function (){
    if(!Setting::get('use_humans'))
    	return Redirect::to(Page::url(Setting::get('redirectpage')));
    return 'Yet to be implemented';
});