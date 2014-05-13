<?php

/*
	///Clase que implementa los queries necesarios para obtener lo requerido de
	 la base de datos////
	 //Se llama como dbprepa::metodo();
*/

class DBPrepa {

	/*
		Funcion que selecciona los campos necesario para llenar la tabla de registro
	*/

	public static function registro()
	{
		$res = DB::select('select idProyectos, idInstitucionfk,nombreProy, descripcion, cupo from Proyectos');
		return $res;
	}

	/*
		Funcion que selecciona el nombre de una institucion de acuerdo con su id
	*/
	public static function nombreIns($id)
	{
		$users = DB::table('Institucion')
					->select('nombreInst')
						->where('idInstitucion', '=', $id)->get();
		return $users;
	}

	/*
		Funcion que reduce el cupo de un proyecto de acuerdo a su id, validado a 0
	*/
	public static function reduceCupo($idProyectos){
		$cupo = DB::table('Proyectos')
					->select('cupo')
						->where('idProyectos', '=', $idProyectos)->get();
		if ($cupo[0]->cupo > 0) {
			DB::table('Proyectos')
				->where('idProyectos', '=', $idProyectos)
					->decrement('cupo', 1);
		}
		else{
			print('<div><h1>Cupo lleno </h1></div>');
		}
	}
	/*
		Funcion que imprime la tabla de registro de proyectos
	*/
	public static function printTabla(){
		$variable = dbprepa::registro();
		$cupo = 'inscrito';
		$i = 0;
		foreach ($variable as $key => $value) {
			$nom = dbprepa::nombreIns($variable[$i]->idInstitucionfk);
			print('         <tr>
                                <td>'.$variable[$i]->nombreProy.'</td>
                                <td>'.$nom[0]->nombreInst.'</td>
                                <td>'.$variable[$i]->descripcion.'</td>
                                <td>'.$variable[$i]->cupo.'</td>
                                <td>');
			/* Validación de un cupo */
			if ($variable[$i]->cupo <= 0) {
				$cupo = 'cupolleno';
			}
			/*Forma de declarar un boton de submit con otro valor*/
			echo Form::open(array('url' => $cupo, 'method' => 'get'));
            echo Form::button('inscribir', array('class' => 'ink-button green', 'value' => $variable[$i]->idProyectos, 'name' => 'inscripcion', 'type' => 'submit'));
    		echo Form::close(); 
    		print('</td> </tr>');
			$i++;
		}
	}

	/*
		Funcion que imprime el inicio de información de la parte de historial del alumno
	*/
	public static function printInfoHistorial($matricula){
		$infoAlumno = DB::table('Alumno')
						->where('matricula', '=', $matricula)->get();
		print('<div class="large-33 contenedorDato">
                        <span class="campoInfo">Nombre:</span>
                        <span class="campoDato">'.$infoAlumno[0]->nombre.'</span>
                    </div>
                    <div class="large-33 contenedorDato">
                        <span class="campoInfo">Matricula:</span>
                        <span class="campoDato">'.$infoAlumno[0]->matricula.'</span>
                    </div>
                    <div class="large-33 contenedorDato">
                        <span class="campoInfo">Semestre:</span>
                        <span class="campoDato">'.$infoAlumno[0]->semestre.'</span>
                    </div>
                    <div class="large-33 contenedorDato">
                        <span class="campoInfo">Email:</span>
                        <span class="campoDato">'.$infoAlumno[0]->correo.'</span>
                    </div>
                    <div class="large-33 contenedorDato">
                        <span class="campoInfo">Estatus:</span>
                        <span class="campoDato">Inscrito</span>
                    </div>
                    <div class="large-33 contenedorDato">
                        <span class="campoInfo">Campus:</span>
                        <span class="campoDato">GDA</span>
                    </div>');
	}

	public static function reporteGeneral()
	{
		/*
		$users = DB::select('SELECT i.idInstitucion, p.idInstitucionfk, p.nombre 
			FROM Institucion i, Proyectos p 
			WHERE i.idInstitucion = p.idInstitucion');
		$users = DB::table('Institucion')
        ->join('Proyectos', function($join)
        {
            $join->on('Institucion.idInstitucion', '=', 'Proyectos.idInstitucionfk');

        })*/

        $users = DB::table('Institucion')
            ->join('Proyectos','Institucion.idInstitucion', '=', 'Proyectos.idInstitucionfk')
            ->join('ProyectosAlumno', 'ProyectosAlumno.idproyectosfk', '=', 'Proyectos.idProyectos')
            ->join('Alumno', 'Alumno.matricula', '=', 'ProyectosAlumno.matriculaAlumnofk')
            ->select('Alumno.nombre', 'Alumno.matricula', 'Institucion.nombreInst', 'Proyectos.nombreProy', 'Alumno.correo', 'Alumno.telefono')
            ->get();
   		 return $users;
	}
}