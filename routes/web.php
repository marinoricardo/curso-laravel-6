<?php


Route::get('/login', function(){
    return "Login";
})->name('login');

// Route::middleware([])->group(function (){

//     // podemos tambem definir o prefixo
//     Route::prefix('admin')->group(function (){

//         Route::namespace('Admin')->group(function () {
//             Route::name('admin.')->group(function (){
//                 Route::get('/dashboard', 'TesteController@teste')->name('dashboard'); // middleware serve para limitar acesse nessa rota
//                 Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
//                 Route::get('/produtos', 'TesteController@teste')->name('produtos');
//                 Route::get('/', 'TesteController@teste')->name('home');
//             });

//         });
        
//     });

// });

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function(){
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard'); // middleware serve para limitar acesso
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    Route::get('/produtos', 'TesteController@index')->name('produtos');
    Route::get('/', 'TesteController@teste')->name('home');

});


// Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
// Route::put('products/{id}', 'ProductController@update')->name('products.update');
// Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
// Route::get('products/create', 'ProductController@create')->name('products.create');
// Route::get('products/{id}', 'ProductController@show')->name('products.show');
// Route::get('products', 'ProductController@index')->name('products.index');
// Route::post('products', 'ProductController@store')->name('products.store');

Route::resource('products', 'ProductController'); //->middleware('auth');


// Route::view('/teste', 'welcome', ['nome' => 'Curso de Laravel 6']);

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
