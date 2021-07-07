<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//EVENTS TABLE
Route::get('/events', 'EventController@index');
Route::get('/events/create', 'EventController@create');
Route::get('/events/{event}', 'EventController@show');
Route::post('/events', 'EventController@store');
Route::get('/events/{event}/edit', 'EventController@edit');
Route::put('/events/{event}', 'EventController@update');
Route::delete('/events/{event}', 'EventController@destroy');

//ADVISER
Route::get('/advisers', 'AdviserController@index');
Route::get('/advisers/create', 'AdviserController@create');
Route::get('/advisers/{adviser}', 'AdviserController@show');
Route::post('/advisers', 'AdviserController@store');
Route::get('/advisers/{adviser}/edit', 'AdviserController@edit');
Route::put('/advisers/{adviser}', 'AdviserController@update');
Route::delete('/advisers/{adviser}', 'AdviserController@destroy');

//PARTNER
Route::get('/partners', 'PartnerController@index');
Route::get('/partners/create', 'PartnerController@create');
Route::get('/partners/{partner}', 'PartnerController@show');
Route::post('/partners', 'PartnerController@store');
Route::get('/partners/{partner}/edit', 'PartnerController@edit');
Route::put('/partners/{partner}', 'PartnerController@update');
Route::delete('/partners/{partner}', 'PartnerController@destroy');

//TESTIMONIAL


Route::get('/testimonials', 'TestimonialController@index');

Route::get('/testimonials/create', 'TestimonialController@create');
Route::get('/testimonials/{testimonial}', 'TestimonialController@show');

Route::post('/testimonials', 'TestimonialController@store');
// Route::post('/testimonials', 'TestimonialController@imageStore');

Route::get('/testimonials/{testimonial}/edit', 'TestimonialController@edit');
Route::put('/testimonials/{testimonial}', 'TestimonialController@update');
Route::delete('/testimonials/{testimonial}', 'TestimonialController@destroy');
