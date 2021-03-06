<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//AUTH
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', 'EventController@indexWelcome');

//EVENTS
Route::get('/events', 'EventController@index');
Route::get('/search', 'EventController@search');
Route::get('/filter', 'EventController@filter');
Route::get('/sort', 'EventController@sort');
Route::get('/events/create', 'EventController@create');
Route::get('/events/{event}', 'EventController@show');
Route::post('/events', 'EventController@store');
Route::get('/events/{event}/edit', 'EventController@edit');
Route::get('/events/img/{event}/edit', 'EventController@editImg');
Route::put('/events/{event}', 'EventController@update');
Route::put('/events/img/{event}', 'EventController@updateImg');
Route::delete('/events/{event}', 'EventController@destroy');

//ADVISER
Route::get('/advisers', 'AdviserController@index');
Route::get('/advisers/create', 'AdviserController@create');
Route::get('/advisers/{adviser}', 'AdviserController@show');
Route::post('/advisers', 'AdviserController@store');
Route::get('/advisers/{adviser}/edit', 'AdviserController@edit');
Route::get('/advisers/img/{adviser}/edit', 'AdviserController@editImg');
Route::put('/advisers/{adviser}', 'AdviserController@update');
Route::put('/advisers/img/{adviser}', 'AdviserController@updateImg');
Route::delete('/advisers/{adviser}', 'AdviserController@destroy');

//PARTNER
Route::get('/partners', 'PartnerController@index');
Route::get('/partners/create', 'PartnerController@create');
Route::get('/partners/{partner}', 'PartnerController@show');
Route::post('/partners', 'PartnerController@store');
Route::get('/partners/{partner}/edit', 'PartnerController@edit');
Route::get('/partners/img/{partner}/edit', 'PartnerController@editImg');
Route::put('/partners/{partner}', 'PartnerController@update');
Route::put('/partners/img/{partner}', 'PartnerController@updateImg');
Route::delete('/partners/{partner}', 'PartnerController@destroy');

//TESTIMONIAL
Route::get('/testimonials', 'TestimonialController@index');
Route::get('/testimonials/create', 'TestimonialController@create');
Route::get('/testimonials/{testimonial}', 'TestimonialController@show');
Route::get('/testimonials/vid/{testimonial}', 'TestimonialController@showVideo');
Route::post('/testimonials', 'TestimonialController@store');
Route::get('/testimonials/{testimonial}/edit', 'TestimonialController@edit');
Route::get('/testimonials/img/{testimonial}/edit', 'TestimonialController@editImg');
Route::get('/testimonials/vid/{testimonial}/edit', 'TestimonialController@editVideo');
Route::put('/testimonials/{testimonial}', 'TestimonialController@update');
Route::put('/testimonials/img/{testimonial}', 'TestimonialController@updateImg');
Route::put('/testimonials/vid/{testimonial}', 'TestimonialController@updateVideo');
Route::delete('/testimonials/{testimonial}', 'TestimonialController@destroy');

//WEBINAR
Route::get('/webinars', 'WebinarController@index');
Route::get('/webinars/create', 'WebinarController@create');
//no show
Route::post('/webinars', 'WebinarController@store');
Route::get('/webinars/{webinar}/edit', 'WebinarController@edit');
Route::get('/webinars/img/{webinar}/edit', 'WebinarController@editImg');
Route::put('/webinars/{webinar}', 'WebinarController@update');
Route::put('/webinars/img/{webinar}', 'WebinarController@updateImg');
Route::delete('/webinars/{webinar}', 'WebinarController@destroy');

//BREAKOUT SESSIONS
Route::get('/breakouts', 'BreakoutController@index');
Route::get('/breakouts/create/', 'BreakoutController@create');
//no show
Route::post('/breakouts', 'BreakoutController@store');
Route::get('/breakouts/{breakout}/edit', 'BreakoutController@edit');
Route::get('/breakouts/img/{breakout}/edit', 'BreakoutController@editImg');
Route::put('/breakouts/{breakout}', 'BreakoutController@update');
Route::put('/breakouts/img/{breakout}', 'BreakoutController@updateImg');
Route::delete('/breakouts/{breakout}', 'BreakoutController@destroy');

