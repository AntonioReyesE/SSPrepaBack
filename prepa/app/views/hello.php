<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tests Laravel</title>
	<style>
	@import url(//fonts.googleapis.com/css?family=Lato:700);

	body {
		margin:0;
		font-family:'Lato', sans-serif;
		text-align:center;
		color: #999;
	}

	.welcome {
		width: 300px;
		height: 200px;
		position: absolute;
		left: 50%;
		top: 50%;
		margin-left: -150px;
		margin-top: -100px;
	}

	a, a:visited {
		text-decoration:none;
	}

	h1 {
		font-size: 32px;
		margin: 16px 0 0 0;
	}
	</style>
</head>
<body>
	<div>
		<h1>Lugar de pruebas de base de datos</h1>

	</div>
	<div>
		<h1>Prueba de select de Alumno</h1>
		<h2><?php
		$users = DB::table('Alumno')->distinct()->get();
		var_dump($users);
		?></h2>
		<h3>
			<?php
			$users = DB::table('Alumno')->distinct()->get();
			print($users[0]->matricula.'<hr>');
			print($users[0]->nombre.'<hr>');
			print($users[0]->password.'<hr>');
			?>

		</h3>
	</div>
	<div>
		<h2>
			<?php

				echo Form::open(array('url' => 'registro')) ;
                                		echo Form::button('inscripcion', array('class' => 'ink-button green', 'value' => 'hello', 'name' => 'inscripcion'));
    			echo  Form::close() ;
			?>

		</h2>


		</div>
	</body>
</html>
