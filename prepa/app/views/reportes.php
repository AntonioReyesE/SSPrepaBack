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
                <div id="contenedorProyectos" class="large-33">
                    <h4>Generar reporte</h4>
                    <hr>
                    <div>
                        <label>Periodo: </label>
                        <?php

                                        $periodos = DB::table('Periodos')->select('idPeriodos')->get();
                                       $periodos2 = DB::table('Periodos')->select('periodo')->get();
                                        $arreglo = array();
                                        for ($i=0; $i < count($periodos); $i++) { 
                                            $arreglo[$periodos[$i]->idPeriodos] = $periodos2[$i]->periodo;
                                        }
                                        echo Form::select('idPeriodosfk',$arreglo);
                                        ?>
                        <a href="generareporte" class="ink-button">Generar</a>
                    </div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Historial</h4>
                    <hr>
                    <div><a class="ink-button" href="historial">Historial por alumno</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Formularios</h4>
                    <hr>
                    <div><a class="ink-button" href="institucion">Agregar institución</a></div>
                    <div><a class="ink-button" href="proyecto">Agregar proyecto</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Documentos</h4>
                    <hr>
                    <div><a class="ink-button" href="institucionexcel">Carga masiva de instituciones</a></div>
                    <div><a class="ink-button" href="proyectoexcel">Carga masiva de proyectos</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Avisos</h4>
                    <hr>
                    <div><a class="ink-button" href="avisos">Administrar avisos</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Alumnos</h4>
                    <hr>
                    <div><a class="ink-button" href="alumnos">Administrar Alumnos</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Periodos</h4>
                    <hr>
                    <div><a class="ink-button" href="periodos">Administrar Periodos</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Proyectos</h4>
                    <hr>
                    <div><a class="ink-button" href="actualizarproyectos">Editar Proyectos</a></div>
                </div>
            </div>
        </div>
    </body>
</html>
