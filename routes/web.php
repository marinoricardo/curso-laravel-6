<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/teste', 'welcome', ['nome' => 'Curso de Laravel 6']);

Route::redirect('/redirect1','/redirect2');
Route::get('redirect1', function(){
    return redirect('/redirect2');
});
Route::get('redirect2', function(){
    return "Redirect 02";
});

Route::get('/contacto', function(){
    return view('contacto');
});
Route::get('/categorias/{flag}', function($flag){
    return "Productos da categoria: {$flag}";
});

Route::get('/any', function(){
    return "Any";
});

Route::get('/', function () {
    return view('welcome');
});
