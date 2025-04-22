<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::get('/', function () {
    $event = Event::where('description','desc')->get()[0];
    dd($event);
    return view("welcome");
});

Route::get('/hello', function () {
    return "hello";
});
