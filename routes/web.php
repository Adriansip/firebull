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

use App\Http\Controller\Auth\ProductosController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware'=>['admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get("/createp", function () {
        return view('createproducto');
    });

    Route::post("/create", 'ProductosController@store');
});

Route::get("/productos", 'ProductosController@index');
Route::get("/productos/show/{idCategoria}", 'ProductosController@show');
Route::get("/productos/{producto}", 'ProductosController@find');

Route::group(['middleware'=>['auth']], function () {
    /*Variables de session*/
    Route::post('/addProducto', 'ShoppingCarController@addShoppingCar');
    Route::get('/getSession', 'ShoppingCarController@getSession');
    Route::get('/shoppingCar', 'ShoppingCarController@index');
    Route::get('/deleteProducto/{item}', 'ShoppingCarController@deleteItem');
    Route::get('/destroySession', 'ShoppingCarController@destroy');
    Route::post('/saveCotizacion', 'CotizacionController@store');
});

Route::get("/nosotros", function () {
    return view('Nosotros.nosotros');
});

Route::get("/items", function () {
    return view('productos');
});
Route::get("/contacto", function () {
    return view('contacto');
});

Route::get("/clientes", 'ClientesController@index');
Route::get("/cursos", 'CursosController@index');
