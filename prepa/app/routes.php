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

Route::post('/registro', 'HomeController@showRegistro');

Route::post('/inscrito', 'HomeController@inscrito');

Route::post('/cupolleno', 'HomeController@cupolleno');

Route::get('/historial', 'HomeController@showHistorial');

Route::get('/avisos', 'HomeController@showAvisos');

Route::get('/reportes', 'HomeController@showReportes');

Route::get('/institucion', 'HomeController@showInstitucion');

Route::get('/proyecto', 'HomeController@showProyecto');

Route::get('/institucionexcel', 'HomeController@showInsExcel');

Route::get('/proyectoexcel', 'HomeController@showProExcel');

Route::get('/generareporte', 'ReportGenerator@reporteProyectos');

Route::get('/llenarinstituciones', 'ReportUploader@subirInstituciones');

Route::get('/subirInstitucion', 'ReportUploader@subirInstitucionesFormulario');

/*Ruteo de Proyectos*/

Route::get('/subirProyecto', 'ReportUploader@subirProyectoFormulario');

Route::get('/actualizarproyectos', 'HomeController@actualizarproyectos');

Route::get('/editar', 'HomeController@editarProyecto');

Route::get('/actualizarProyecto', 'ReportUploader@actualizarProyecto');

/*Ruteo para periodos*/

Route::get('/periodos', 'HomeController@periodos');

Route::get('/agregarPeriodo', 'HomeController@periodosNuevo');

Route::get('/agregarPeriodoNuevo', 'ReportUploader@agregarPeriodoNuevo');

Route::get('/actualizarPeriodo', 'HomeController@actualizarPeriodo');

Route::get('/actualizarPeriodoSeleccionado', 'ReportUploader@actualizarPeriodoSeleccionado');

/*ruteo para alumnos*/

Route::get('/alumnos', 'HomeController@alumnos');

Route::get('/eliminarProyecto', 'ReportUploader@eliminarProyecto');

/*Pruebas*/
Route::post('/upload', function(){
     if(Input::hasFile('archivo')) {
          Input::file('archivo')
               ->move('/','archivo');
     }
     return Redirect::back('/');
});


Route::get('/registro', function()
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