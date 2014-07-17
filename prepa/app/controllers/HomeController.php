<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showIndex()
	{
		return View::make('index');
	}

	public function showRegistro()
	{
		return View::make('registro');
	}

	public function inscrito()
	{
		return View::make('inscrito');
	}

	public function cupolleno()
	{
		return View::make('cupolleno');
	}

	public function showHistorial()
	{
		return View::make('historial');
	}

	public function showAvisos()
	{
		return View::make('avisos');
	}

	public function showReportes()
	{
		return View::make('reportes');
	}

	public function showInstitucion()
	{
		return View::make('institucion');
	}

	public function showInsExcel()
	{
		return View::make('institucionexcel');
	}

	/*modificación de proyectos*/

	public function showProyecto()
	{
		return View::make('proyecto');
	}

	public function showProExcel()
	{
		return View::make('proyectoexcel');
	}

	public function actualizarproyectos()
	{
		return View::make('actualizarproyectos');
	}

	public function editarproyecto()
	{
		//$proyecto = Input::get('editar');
		//$proyecto = $_GET['editar'];
       // Session::push('idProyectos', $proyecto);
        //print_r($proyecto);
        
		return View::make('editarProyecto');
	}

	/*Periodos*/

	public function periodos()
	{
	
		return View::make('periodos');
	}

	public function periodosNuevo()
	{
	
		return View::make('agregarPeriodo');
	}

	public function actualizarPeriodo()
	{
	
		return View::make('actualizarPeriodo');
	}

	/*Alumnos*/

	public function alumnos()
	{
	
		return View::make('alumnos');
	}

}
