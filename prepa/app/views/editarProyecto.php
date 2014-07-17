<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            Servicio Social
        </title>
        <meta name="description" content="Portal de Servicio Social, PrepaTec">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" type="text/css" href="packages/css/ink-min.css">
        <link rel="stylesheet" type="text/css" href="packages/css/general.css">
        <link rel="stylesheet" type="text/css" href="packages/css/registro/registro.css">
        
        <!--[if IE 7 ]>
            <link rel="stylesheet" href="packages/css/ink-ie7.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <![endif]-->
        
        <script type="text/javascript" src="packages/js/holder.js"></script>
        <script type="text/javascript" src="packages/js/ink.min.js"></script>
        <script type="text/javascript" src="packages/js/ink-ui.min.js"></script>
        <script type="text/javascript" src="packages/js/autoload.js"></script>
        <script type="text/javascript" src="packages/js/html5shiv.js"></script>        

    </head>
    
    <body>
        <header>
            <nav class="ink-navigation">
                <ul class="menu horizontal blue">
                    <li>
                        <a href="index">Registro de Servicio Social</a>
                    </li>
                    <li class="push-right">
                        <a href="index"><i class="icon-signout"></i> Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="contenedor" class="ink-grid">
            <div class="column-group">
                <h1>Proyectos</h1>
                <div>
                	<form action="actualizarProyecto" class="ink-form">
                	 <div class="large-100" style="padding-top:1em;">
                        <table class="ink-table bordered alternating hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th class="content-left">Proyecto</th>
                                    <th class="content-left">Institución</th>
                                    <th class="content-left">Periodo</th>
                                    <th class="content-left">Horas</th>
                                    

                                    
                                </tr>
                            </thead>
                            <tbody>

                                 <?php
                                /*
                                    Campo que imprime todos los proyectos disponibles
                                */
                                    $proyecto = $_GET['editar'];
                                    $proyectos = DB::table('Proyectos')
                                    ->join('Periodos', 'idPeriodos', '=', 'Proyectos.idPeriodosfk')
                                    ->where('Proyectos.idProyectos', '=', $proyecto)
                                    ->get();
                                    print('<tr>');
                                    print('<td>');
                                    echo Form::text('nombreProy', $proyectos[0]->nombreProy);
                                    print('</td>');
                                    print('<td>');
                                    $instituciones = DB::table('Institucion')->get();
           							$institucion = array();
           							foreach ($instituciones as $key => $value) {
           								$institucion[$value->idInstitucion] = $value->nombreInst;
           							}
                                    echo Form::select('idInstitucionfk',$institucion);
                                    print('</td>');
                                    print('<td>');
                                    $periodos = DB::table('Periodos')->get();
           							$periodo = array();
           							foreach ($periodos as $key => $value) {
           								$periodo[$value->idPeriodos] = $value->periodo;
           							}
                                    echo Form::select('idPeriodosfk',$periodo);
                                    print('</td>');
                                    /*
                                    print('<td>');
                                    echo Form::text('fechaInicio', $proyectos[0]->fechaInicio, array('type' => 'date'));
                                    print('</td>');
                                    print('<td>');
                                    echo Form::text('fechaFin', $proyectos[0]->fechaFin, array('type' => 'date'));
                                    print('</td>');
                                    */
                                    print('<td>');
                                    echo Form::text('horas', $proyectos[0]->horas);
                                    print('</td>');
                                    
                                    print('</tr>');
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="large-100" style="padding-top:1em;">
                        <table class="ink-table bordered alternating hover" style="font-size:14px;">
                        	<thead>
                                <tr>
                                    
                                    <th class="content-left">Cupo actual</th>
                                    <th class="content-left">Descripción</th>
                                    <th class="content-left">Contacto</th>
                                    <?php
                                     print('<tr>');
                                    print('<td>');
                                    echo Form::text('cupo', $proyectos[0]->cupo);
                                    print('</td>');
                                    print('<td>');
                                    echo Form::text('descripcion', $proyectos[0]->descripcion);
                                    print('</td>');
                                    print('<td>');
                                    echo Form::text('contacto', $proyectos[0]->contacto);
                                    print('</td>');
                                    print('</tr>');
                                    
                                    ?>
                                    
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                        <?php
                        	echo Form::submit('Guardar', array('class' => 'ink-button'));
                        	Session::push('idProyectos',$proyecto);
                        ?>
                    </div>
                </div>	
            </form>
            </div>
        </div>
    </body>

</html>