<?php

use App\Models\Country;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clock', function () {
    return view('clock');
});

Route::get('/duck', function () {
    return view('duck');
});

Route::get('/empty', function () {
    return view('empty');
});

Route::get('/countries', function () {
    return view('countries', ['countries' => Country::orderBy('name')->get()]);
});

Route::post('/countries/{country}/toggle-great', function (Country $country) {
    $country->update(['is_great' => !$country->is_great]);

    return redirect('/countries');
});
