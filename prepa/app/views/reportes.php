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
                        <a href="index">Portal de Servicio Social</a>
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
                        <select>
                            <option>Todos los periodos</option>
                            <option>ENE-MAY 2014</option>
                            <option>AGO-DIC 2013</option>
                        </select>
                        <a href="generareporte" class="ink-button">Generar</a>
                    </div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Historial</h4>
                    <hr>
                    <div><a class="ink-button" href="historial">Hitorial por alumno</a></div>
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
                    <div><a class="ink-button" href="institucionexcel">Agregar instituciones desde excel</a></div>
                    <div><a class="ink-button" href="proyectoexcel">Agregar proyecto desde excel</a></div>
                </div>
                <div id="contenedorProyectos" class="large-33">
                    <h4>Avisos</h4>
                    <hr>
                    <div><a class="ink-button" href="avisos">Administrar avisos</a></div>
                </div>
            </div>
        </div>
    </body>

</html>
