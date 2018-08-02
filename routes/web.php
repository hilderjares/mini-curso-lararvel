<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rota/{id}/{nome}', function ($id,$nome) {
    //return view('teste')->with('varname',$varname);
    return view('teste')->with(compact('id','nome'));
});

Route::get('foo', function(){
	return public_path();
});


/* 

O roteador permite que você registre rotas que respondem a qualquer verbo HTTP: 

$uri = null;
$callback = null;
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

*/

Route::match(['get', 'post'], '/form', function () {
    return '#macth';
});

// parametros de rotas 

Route::get('/param{id}', function($id){
	return "O ID do cliente: {$id}";
});

Route::get('/nome/{nome}/id/{id}', function($nome,$id){
	//return "O ID do cliente: {$id}"."<br>"."O Nome do cliente: {$nome}";
	$texto = nl2br("O ID do cliente: {$id}\nO Nome do cliente: {$nome}");
	return $texto;
});

// parametros opicionais

Route::get('/active/{active?}', function($active='false'){
	return $active;
});

// Restrições de expressões regulares

Route::get('/number{number}', function($number){
	return $number;
})->where('number','[0-9]');

// rotas nomeadas 

Route::get('/name{id}', function(){
	return 'rota nomeada {$id}';
})->name('rota');

//$url = route('rota', ['id' => 1]);

Route::get('/redirect', function(){
	// Generating URLs...
	$url = route('rota');
	return $url;
	// Generating Redirects...
	//return redirect()->route('rota');
});

// grupos de rotas 

Route::group(['prefix' => 'cliente'], function(){

	Route::get('/insert', function(){
		return 'insert';
	});

	Route::get('/update', function(){
		return 'update';
	});

	Route::get('/delete', function(){
		return 'delete';
	});

});

// rotas com controllers

Route::get('/cliente/listar','ControllerCliente@index');

/* validar formulario rota post

Route::get('/formulario', function(){
	$url = route('route-form');
	return view('form')->with(compact('url'));
});

Route::post('/validar', function(Request $request){
	//$nome = $request->input('nome');
	//$idade = $request->input('idade');
	$user = $request->all();
	
	return $user;
})->name('route-form');

*/

// CRUD laravel
	Route::get('/index','ClienteController@index')->name('index');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/formulario', 'ClienteController@form')->name('formulario');
	Route::post('/validar', 'ClienteController@store')->name('urlform');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// rota para validar um arquivo tipo file

Route::get('/file', 'UploadController@index');
Route::post('/file/validar', 'UploadController@store')->name('route-file');
Route::get('/file/show', 'UploadController@show');
