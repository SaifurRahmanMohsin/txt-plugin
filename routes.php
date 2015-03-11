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

Route::get('browserconfig.xml', function (){
  if (!$theme = Theme::getEditTheme())
    throw new ApplicationException('Unable to find the active theme.');
  $ico_path = URL::to('/'). '/themes/' . $theme->getDirName() . '/assets/images/ico';
  $msft_icons = <<< THEXML
<?xml version="1.0" encoding="utf-8"?>
<browserconfig>
    <msapplication>
        <tile>
            <square70x70logo src="$ico_path/tile.png"/>
            <square150x150logo src="$ico_path/tile.png"/>
            <wide310x150logo src="$ico_path/tile-wide.png"/>
            <square310x310logo src="$ico_path/tile.png"/>
        </tile>
    </msapplication>
</browserconfig>
THEXML;
    return Response::make($msft_icons, 200, array('Content-Type' => 'application/xml'));
});

Route::get('favicon.ico', function (){
  if (!$theme = Theme::getEditTheme())
    throw new ApplicationException('Unable to find the active theme.');
  $ico_path = themes_path() . '/' . $theme->getDirName() . '/assets/images/ico/favicon.ico';
  $image = File::get($ico_path);
    return Response::make($image, 200, ['content-type' => 'image/x-icon']);
});
