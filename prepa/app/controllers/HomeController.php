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


}
