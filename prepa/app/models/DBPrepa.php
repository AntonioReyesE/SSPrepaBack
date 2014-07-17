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
		$res = DB::select('select idProyectos, idInstitucionfk,nombreProy, descripcion, cupo, horas from Proyectos');
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
		dbprepa::registroProyecto($idProyectos);
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
                                <td>'.$variable[$i]->horas.'</td>
                                <td>');
			/* Validación de un cupo */
			if ($variable[$i]->cupo <= 0) {
				$cupo = 'cupolleno';
			}
			else{
				$cupo = 'inscrito';
			}
			/*Forma de declarar un boton de submit con otro valor*/
			echo Form::open(array('url' => $cupo, 'method' => 'post'));
            echo Form::button('inscribir', array('class' => 'ink-button green', 'value' => $variable[$i]->idProyectos, 'name' => 'inscripcion', 'type' => 'submit'));
    		echo Form::close(); 
    		print('</td> </tr>');
			$i++;
		}
	}

	/*
		Función que imprime el inicio de información de la parte de historial del alumno
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

	/*
		Función que obtiene el Historial del alumno por su matrícula
	*/
	public static function historialProyectos($matricula){

            $proyectos = DB::table('ProyectosAlumno')
            ->join('Proyectos','ProyectosAlumno.idproyectosfk', '=', 'Proyectos.idProyectos')
           ->join('Institucion','Institucion.idInstitucion', '=', 'Proyectos.idInstitucionfk')
           ->join('Periodos','Proyectos.idPeriodosfk', '=', 'Periodos.idPeriodos')
            ->select('Institucion.nombreInst', 'Proyectos.nombreProy', 'Proyectos.horas', 'Periodos.periodo',
            	'Periodos.fechaInicio','Periodos.fechaFin', 'ProyectosAlumno.estatus')
            ->where('matriculaAlumnofk', '=', $matricula)
            ->get();

            return $proyectos;

	}

	/*
		Función que imprime el Historial del alumno por su matrícula
	*/
	public static function printHistorialProyectos($matricula){

           $proyectos = dbprepa::historialProyectos($matricula);
           foreach ($proyectos as $key => $value) {
           		print('<tr>');
           		print('<td>'.$value->nombreProy.'</td>');
           		print('<td>'.$value->nombreInst.'</td>');
           		print('<td>'.$value->periodo.'</td>');
           		print('<td>'.$value->fechaInicio.'</td>');
           		print('<td>'.$value->fechaFin.'</td>');
           		print('<td>'.$value->horas.'</td>');
           		print('<td>'.$value->estatus.'</td>');
           		print('</tr>');
           }
	}

	/*
		Función que imprime todos los proyectos
	*/
	public static function printProyectos(){

           $proyectos = DB::table('Proyectos')
           ->join('Periodos', 'idPeriodos', '=', 'Proyectos.idPeriodosfk')
           ->join('Institucion', 'idInstitucion', '=', 'Proyectos.idInstitucionfk')
           ->get();
           foreach ($proyectos as $key => $value) {
           		print('<tr>');
           		print('<td>'.$value->nombreProy.'</td>');
           		print('<td>'.$value->nombreInst.'</td>');
           		print('<td>'.$value->periodo.'</td>');
           		print('<td>'.$value->fechaInicio.'</td>');
           		print('<td>'.$value->fechaFin.'</td>');
           		print('<td>'.$value->horas.'</td>');
           		print('<td>'.$value->cupo.'</td>');
           		//Boton para modificar el proyecto
           		print('<td> <a type="submit" class="ink-button" href="editar?editar='.$value->idProyectos.'" name="editar" id="editar" value="'.$value->idProyectos.'">Editar</a></td>');
           		print('</tr>');
           }
	}

	public static function reporteGeneral()
	{

        $users = DB::table('Institucion')
            ->join('Proyectos','Institucion.idInstitucion', '=', 'Proyectos.idInstitucionfk')
            ->join('ProyectosAlumno', 'ProyectosAlumno.idproyectosfk', '=', 'Proyectos.idProyectos')
            ->join('Alumno', 'Alumno.matricula', '=', 'ProyectosAlumno.matriculaAlumnofk')
            ->select('Alumno.nombre', 'Alumno.matricula', 'Institucion.nombreInst', 'Proyectos.nombreProy', 'Alumno.correo', 'Alumno.telefono')
            ->get();
   		 return $users;
	}

	/*
		Función que hace el registro entre un proyecto y el alumno
	*/
	public static function registroProyecto($idProyecto){
		$matricula = Session::get('matricula');
		DB::insert('insert into ProyectosAlumno (matriculaAlumnofk, idproyectosfk, estatus) values (?, ?, ?)', array(end($matricula), $idProyecto, 'Cursando'));
	

	}

		/*
		Función que guarda una institución nueva a partir del formulario
	*/
	public static function guardarInstitucion($nombreInst, $contacto, $telefono, $direccion, $correo, $mapa, $pagina, $facebook){
		$id = DB::table('Institucion')->max('idInstitucion');
		$id = $id + 1;
		DB::insert('insert into Institucion (idInstitucion ,nombreInst, contacto, telefono, direccion, correo, mapa, pagina, facebook) 
			values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array($id ,$nombreInst, $contacto, $telefono, $direccion, $correo, $mapa, $pagina, $facebook));

	}

/*-----------------------------Apartado de periodos---------------------*/

	/*
		Función que imprime todos los periodos
	*/
	public static function printPeriodos(){

           $periodos = DB::table('Periodos')->get();
           foreach ($periodos as $key => $value) {
           		print('<tr>');
           		print('<td>'.$value->periodo.'</td>');
           		print('<td>'.$value->fechaInicio.'</td>');
           		print('<td>'.$value->fechaFin.'</td>');
           		//Boton para modificar el proyecto
           		print('<td> <a type="submit" class="ink-button" href="actualizarPeriodo?periodo='.$value->idPeriodos.'" name="periodo" id="periodo" value="'.$value->idPeriodos.'">Editar</a></td>');
           		print('</tr>');
           }
	}

/*----------------------------Apartado de alumnos-------------------------*/

	/*
		Función que imprime el Historial del alumno por su matrícula
	*/
	public static function actualizarProyectoAlumno($matricula){

           $proyectos = DB::table('ProyectosAlumno')
            ->join('Proyectos','ProyectosAlumno.idproyectosfk', '=', 'Proyectos.idProyectos')
           ->join('Institucion','Institucion.idInstitucion', '=', 'Proyectos.idInstitucionfk')
           ->join('Periodos','Proyectos.idPeriodosfk', '=', 'Periodos.idPeriodos')
            ->where('matriculaAlumnofk', '=', $matricula)
            ->get();
           foreach ($proyectos as $key => $value) {
           		print('<tr>');
           		print('<td>'.$value->nombreProy.'</td>');
           		print('<td>'.$value->nombreInst.'</td>');
           		print('<td>'.$value->periodo.'</td>');
           		print('<td>'.$value->fechaInicio.'</td>');
           		print('<td>'.$value->fechaFin.'</td>');
           		print('<td>'.$value->horas.'</td>');
           		print('<td>'.$value->estatus.'</td>');
           		print('<td> <a type="submit" class="ink-button red" 
           			href="eliminarProyecto?idproyectosfk='.$value->idproyectosfk.'&matriculaAlumnofk='.$matricula.'" 
           			name="periodo" id="periodo" value="'.$value->idproyectosfk.'">Eliminar</a></td>');
           		print('</tr>');
           }
	}
}