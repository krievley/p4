<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

/*
|--------------------------------------------------------------------------
| Form Macros
|--------------------------------------------------------------------------
|
| The following macros will be used in several of the views
| as forms.
|
*/

//Month Form
Form::macro('month', function($selected = null) 
{
   $output = '<select id="month" name="month"><option value="none">Month</option>';
   for($m=1; $m<=12; $m++) {
       if ($m == $selected) {
           $output .= '<option value="' . $m . '" selected >' . $m . '</option>';
       }
       else {
        $output .= '<option value="' . $m . '">' . $m . '</option>';
       }
   }
   $output .= '</select>';
   
   return $output;
});

//Day Form
Form::macro('day', function($selected = null)
{
   $output = '<select id="day" name="day"><option value="none">Day</option>';
   for($d=1; $d<=31; $d++) {
       if ($d == $selected) {
           $output .= '<option value="' . $d . '" selected >' . $d . '</option>';
       }
       else {
           $output .= '<option value="' . $d . '">' . $d . '</option>';
       }
   }
   $output .= '</select>';
   
   return $output;
});

//Year Form
Form::macro('year', function($selected = null)
{
   $currentYear = date('Y');
   $output = '<select id="year" name="year"><option value="none">Year</option>';
   for($y=($currentYear); $y<=($currentYear + 10); $y++) {
       if ($y == $selected) {
           $output .= '<option value="' . $y . '" selected >' . $y . '</option>';
       }
       else {
           $output .= '<option value="' . $y . '">' . $y . '</option>';
       }
   }
   $output .= '</select>';
   
   return $output;
});

//Hour Form
Form::macro('hour', function($selected = null)
{
   $output = '<option value="none">Hour</option>';
   for($h=1; $h<=12; $h++) {
       if ($h == $selected) {
           $output .= '<option value="' . $h . '" selected >' . $h . '</option>';
       }
       else {
           $output .= '<option value="' . $h . '">' . $h . '</option>';
       }
   }
   
   return $output;
});

//Minute Form
Form::macro('minute', function($selected = 100)
{
   $output = '<option value="none">Minute</option>';
   for($m=0; $m<=55; $m+=5) {
       if ($m == $selected) {
           $output .= '<option value="' . str_pad($m, 2, "0", STR_PAD_LEFT) . '" selected >' . str_pad($m, 2, "0", STR_PAD_LEFT) . '</option>';
       }
       else {
           $output .= '<option value="' . str_pad($m, 2, "0", STR_PAD_LEFT) . '">' . str_pad($m, 2, "0", STR_PAD_LEFT) . '</option>';
       }
   }
   
   return $output;
});
