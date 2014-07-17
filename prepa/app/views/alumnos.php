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
        <link rel="stylesheet" type="text/css" href="packages/css/historial/historial.css">
        
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
                <div id="contenedorProyectos" class="large-100">
                    <h4>Alumnos</h4>
                    <form class="ink-form">
                        <div class="control-group">
                            <div class="column-group gutters">
                                <div class="control large-25 append-button">


                                    <!--


                                    <form>
                                        <span><input type="text" placeholder="A0 . . ."></span>


                                        <button class="ink-button"><i class="icon-search"></i> Buscar</button>
                                    </form>
                                
                                -->

                                <?php
                                echo Form::open(array('url' => '/historial','method' => 'get')) ;
                                echo Form::text('matricula','', array('id' => 'matricula', 'placeholder' => 'A00XXXXXX',
                                    'name' => 'matricula', 'pattern' => '[A|a][0-9]{8}', 'title' => 'La matrícula debe seguir el formato: A00XXXXXX', 'required'));
                                echo Form::submit('buscar',array('class' => 'ink-button', ));
                                echo  Form::close() ;
                                ?>
                                </div>
       
                            </div>
                        </div>
                    </form>

                    <?php
                    /*
                        Campo que agrega el inicio del historial
                    */
                        $matricula = Input::get('matricula');
                        if (Input::has('matricula')) {
                            dbprepa::printInfoHistorial($matricula);

                        }
                        

                    ?>
                    <div class="large-100" style="padding-top:1em;">
                        <table class="ink-table bordered alternating hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th class="content-left">Proyecto</th>
                                    <th class="content-left">Asociación</th>
                                    <th class="content-left">Periodo</th>
                                    <th class="content-left">Fecha Inicio</th>
                                    <th class="content-left">Fecha Fin</th>
                                    <th class="content-left">Horas</th>
                                    <th class="content-left">Estatus</th>
                                    <th class="content-left">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                 <?php
                                /*
                                    Campo que agrega los proyectos del historial
                                */
                                    $matricula = Input::get('matricula');
                                    if (Input::has('matricula')) {
                                        dbprepa::actualizarProyectoAlumno($matricula);
                
                                    }
                                    

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>