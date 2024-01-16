<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/escribeme', function () {
    return "contactame";
})-> name("contacto");

Route::get('/custom', function() {

    $msj ="Mensaje del servidor *-*";

    $data =['msj' => $msj, "edad" => 15];
    return view('custom',$data);
});
