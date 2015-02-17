<?php

use Cms\Classes\Page;
use Mohsin\Txt\Models\Robot;
use Mohsin\Txt\Models\Human;
use Mohsin\Txt\Models\Setting;

Route::get('robots.txt', function (){
    if(!Setting::get('use_robots') || !Robot::first())
    	return Redirect::to(Page::url(Setting::get('redirectpage')));
    return Response::make(Robot::first()->generateTxt(), 200, array('Content-Type' => 'text/plain'));
});

Route::get('humans.txt', function (){
    if(!Setting::get('use_humans') || !Human::first())
    	return Redirect::to(Page::url(Setting::get('redirectpage')));
    return Response::make(Human::first()->generateTxt(), 200, array('Content-Type' => 'text/plain'));
});