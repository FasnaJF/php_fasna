<?php

use App\Http\Controllers\RepresentativeController;
use Illuminate\Support\Facades\Route;

Route::resource('representatives', RepresentativeController::class);
Route::get('/', function () {
    return redirect('/representatives');
});
