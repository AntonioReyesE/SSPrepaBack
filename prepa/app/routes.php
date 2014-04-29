<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('hello', function()
{
	return View::make('hello');
});

Route::get('/', 'HomeController@showIndex');

Route::get('/index', 'HomeController@showIndex');

Route::get('/registro', 'HomeController@showRegistro');

Route::get('/inscrito', 'HomeController@inscrito');

Route::get('/cupolleno', 'HomeController@cupolleno');

Route::get('/historial', 'HomeController@showHistorial');

Route::get('/avisos', 'HomeController@showAvisos');

Route::get('/reportes', 'HomeController@showReportes');

Route::post('/registro', function()
{
        /* Get the login form data using the 'Input' class */
      // $password = Input::get('password');
       // $matricula = Input::get('matricula');

        $userdata = array(
            'matricula' => 'A01224955',
            'password' => 'holamundo',
        );
 
        /* Try to authenticate the credentials */
       /* Nota importante: attempt siempre verifica el password con hash*/
        if(Auth::attempt($userdata)) 
        {
            // we are now logged in, go to admin
            return Redirect::to('registro');
        }
        else
        {
            return Redirect::to('hello');
        }
});