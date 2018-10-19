<?php


Route::get('/', function () {
    return view(config('artisancms.front.theme').'::welcome');
})->name('front');

Route::get('dash', function () {
    return view('admin::dashboard');
})->name('admin.dash');

// Auth::routes();
