<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['mensaje' => 'Hola desde la API'];
});
