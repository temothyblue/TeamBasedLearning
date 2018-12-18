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

Route::get('/', function () {
	if(Session::get('user')){
		if(Session::get('level')==1){
			return redirect('/alumno');
		}
		if(Session::get('level')==0){
			return redirect('/ayudante');
		}
	}
	else{
    	return view('login');
    }
});

Route::get('/alumno','responseController@listRom');
Route::get('/ayudante',function(){
	return view('ayudante');
});
Route::get('/ayudante/crear_tema',function(){
	return view('actions.crear_tema');
});
Route::get('/ayudante/crear_tema',function(){
	return view('actions.crear_tema');
});

Route::post('/loginme','loginController@login');
Route::get('/logout','loginController@logout');

Route::get('/prueba','TecnicaController@add');
Route::get('/usuario/{id}','UsuarioController@show');
Route::get('/usuario2','UsuarioController@showall');