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
		$res = DB::select('select idProyectos, idInstitucionfk,nombre, descripcion, cupo from Proyectos');
		return $res;
	}

	/*
		Funcion que selecciona el nombre de una institucion de acuerdo con su id
	*/
	public static function nombreIns($id)
	{
		$users = DB::table('Institucion')
					->select('nombre')
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
		Funcion que imprime la tabla de la pantalla de registro de proyectos
	*//*
	public static function printTabla(){
		$variable = dbprepa::registro();
		$i = 0;
		foreach ($variable as $key => $value) {
			$nom = dbprepa::nombreIns($variable[$i]->idInstitucionfk);
			print('         <tr>
                                <td>'.$variable[$i]->nombre.'</td>
                                <td>'.$nom[0]->nombre.'</td>
                                <td>'.$variable[$i]->descripcion.'</td>
                                <td>'.$variable[$i]->cupo.'</td>
                                <td><form action="registro" method="get"><input class="ink-button green" type="submit" value='.$variable[$i]->idProyectos.'  name="inscripcion"></input> </form></td>
                            </tr>');
			$i++;
		}
	}*/

	public static function printTabla(){
		$variable = dbprepa::registro();
		$i = 0;
		foreach ($variable as $key => $value) {
			$nom = dbprepa::nombreIns($variable[$i]->idInstitucionfk);
			print('         <tr>
                                <td>'.$variable[$i]->nombre.'</td>
                                <td>'.$nom[0]->nombre.'</td>
                                <td>'.$variable[$i]->descripcion.'</td>
                                <td>'.$variable[$i]->cupo.'</td>
                                <td>');
			echo Form::open(array('url' => 'registro', 'method' => 'get'));
            echo Form::submit($variable[$i]->idProyectos, array('class' => 'ink-button green', 'value' => $variable[$i]->idProyectos, 'name' => 'inscripcion'));
    		echo Form::close(); 
    		print('</td> </tr>');
			$i++;
		}
	}
}