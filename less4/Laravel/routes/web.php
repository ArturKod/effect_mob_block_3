<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check-db', function () {
    echo '<pre>';
    print_r(DB::table('users')->get());
    echo '</pre>';

    return "";
});
