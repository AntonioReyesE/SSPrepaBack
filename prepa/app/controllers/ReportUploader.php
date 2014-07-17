<?php

class ReportUploader extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Custom Home Controller
	|--------------------------------------------------------------------------
	|
	| In use for methods of downloading and generation reports from the database
	|
	|	Route::get('/', 'ReportGenerator@method');
	|
	*/

	/*
		Funcion que genera los reportes en relacion de alumno-proyecto
	*/
	public function subirInstituciones()
	{
		
		
	}

	/*
		Función que guarda los datos de una institucion a partir del formulario
	*/
	public function subirInstitucionesFormulario()
	{
		$datos = Input::all();
		
		dbprepa::guardarInstitucion($datos['nombre'], $datos['contacto'], $datos['telefono'],
			$datos['direccion'],$datos['correo'],$datos['mapa'],$datos['pagina'],
			$datos['facebook']);
		return View::make('cargaexitosa');
		
	}

	/*
		Función que guarda los datos de un proyecto a partir del formulario
	*/
	public function subirProyectoFormulario()
	{
		$datos = Input::all();
		DB::table('Proyectos')->insert(
    $datos
);
		return View::make('cargaexitosa');
		
	}

	/*
		Función que actualiza los datos de un proyecto a partir del formulario
	*/
	public function actualizarProyecto()
	{
		$datos = Input::all();
		$idProyectos = Session::get('idProyectos');

		DB::table('Proyectos')
		->where('idProyectos', end($idProyectos))
		->update($datos);
		return View::make('cargaexitosa');
		
	}

	/*
		Función que agrega un proyecto nuevo
	*/
	public function agregarPeriodoNuevo()
	{
		$datos = Input::all();
		
		DB::table('Periodos')
		->insert($datos);
		return View::make('cargaexitosa');
		
	}

	/*
		Función que actualiza los datos de un periodo a partir del formulario
	*/
	public function actualizarPeriodoSeleccionado()
	{
		$datos = Input::all();
		$idPeriodos = Session::get('idPeriodos');

		DB::table('Periodos')
		->where('idPeriodos', end($idPeriodos))
		->update($datos);
		return View::make('cargaexitosa');
		
	}

	/*
		Función que elimina los datos de un proyecto de alumno 
	*/
	public function eliminarProyecto()
	{
		$datos = Input::all();
		DB::table('ProyectosAlumno')
		->where('idProyectosfk', '=', $datos['idproyectosfk'])
		->where('matriculaAlumnofk', '=', $datos['matriculaAlumnofk'])
		->delete();

		return View::make('cargaexitosa');
		
	}



}