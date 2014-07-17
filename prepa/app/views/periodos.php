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
                <h1>Periodos</h1>
                <div>
                     <div class="large-100" style="padding-top:1em;">
                        <table class="ink-table bordered alternating hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th class="content-left">Periodo</th>
                                    <th class="content-left">Fecha Inicio</th>
                                    <th class="content-left">Fecha Fin</th>
                                    <th class="content-left">Editar</th>
                                </tr>
                            </thead>
                            <tbody>

                                 <?php
                                /*
                                    Campo que imprime todos los periodos disponibles
                                */
                                    
                                        dbprepa::printPeriodos();
        
                                ?>
                            </tbody>
                        </table>
                        <a type="submit" class="ink-button" href="agregarPeriodo" name="agregar" value="agregar">Agregar un periodo</a></td>
                    </div>
                </div>  
            </div>
        </div>
    </body>
</html>