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
                        <a href="index">Portal de Servicio Social</a>
                    </li>
                    <li class="push-right">
                        <a href="index"><i class="icon-signout"></i> Cerrar sesión</a>
                    </li>
                    <li class="push-right">
                        <a href="historial">Historial</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="ink-grid">
            <div class="column-group">
                <div id="contenedor" class="large-50 small-100 push-center">
                    <h4>Avisos</h4>
                    <form class="ink-form">
                        <div class="control-group">
                            <div class="column-group gutters">
                                <div class="control large-35 push-right">
                                    <span><button class="ink-button">Agregar</button></span>
                                </div>
                                <div class="control large-45 push-right content-right">
                                    <div class="input-file">
                                        <input type="file" id="file-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="large-100" style="padding-top:1em;">
                        <table class="ink-table bordered alternating hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th class="content-left">Aviso</th>
                                    <th class="content-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>imagen.png</td>
                                    <td><button class="ink-button red">Eliminar</button></td>
                                </tr>
                                <tr>
                                    <td>imagen.png</td>
                                    <td><button class="ink-button red">Eliminar</button></td>
                                </tr>
                                <tr>
                                    <td>imagen.png</td>
                                    <td><button class="ink-button red">Eliminar</button></td>
                                </tr>
                                <tr>
                                    <td>imagen.png</td>
                                    <td><button class="ink-button red">Eliminar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
