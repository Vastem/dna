<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/api', 301);
Route::fallback(function () {
    return redirect('/api', 301);
});



