<?php

class ReportGenerator extends BaseController {

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
	public function reporteProyectos()
	{
		
		header('Content-type:text/csv');
		header('Content-Disposition:attachment;filename="reporteGeneral.csv"');
		header('Pragma: no-cache');
		header('Expires: 0');
		$reporte = dbprepa::reporteGeneral();

		echo "Nombre, Matricula, Asociacion, Proyecto, email, telefono";
		echo "\n";
		foreach ($reporte as $row) {
			foreach ($row as $dato) {
				echo utf8_decode($dato).',';
			}
			echo "\n";
		}
	}

}