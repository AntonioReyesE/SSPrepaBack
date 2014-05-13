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
                        <a href="index.html">Portal de Servicio Social</a>
                    </li>
                    <li class="push-right">
                        <a href="index.html"><i class="icon-signout"></i> Cerrar sesión</a>
                    </li>
                    <li class="push-right">
                        <a href="historial.html">Historial</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="ink-grid">
            <div class="column-group">
                <div id="contenedor" class="large-75 small-100 push-center">
                    <h4>Agregar proyecto</h4>
                    <div class="large-100" style="padding:1em;">
                        <form action="#" class="ink-form">
                            <fieldset class="column-group gutters">
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="nombre">Nombre de institucion</label>
                                    <div class="control">
                                        <select required>
                                            <option value="nombre1">Institución 1</option>
                                            <option value="nombre2">Institución 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="inicio">Inicio</label>
                                    <div class="control">
                                        <input type="date" id="inicio" required>
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="fin">Fin</label>
                                    <div class="control">
                                        <input type="date" id="fin" required>
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="cupo">Cupo</label>
                                    <div class="control">
                                        <input type="number" id="cupo" required>
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="correo">Correo</label>
                                    <div class="control">
                                        <input type="email" id="correo">
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="contacto">Contacto</label>
                                    <div class="control">
                                        <input type="text" id="contacto">
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="descripcion">Descripción</label>
                                    <div class="control">
                                        <input type="text" id="descripcion" required>
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100">
                                    <label for="periodo">Periodo</label>
                                    <div class="control">
                                        <input type="text" id="periodo" required>
                                    </div>
                                </div>
                                <div class="control-group large-33 medium-33 small-100 push-right">
                                    <label>&nbsp;</label>
                                    <div class="control">
                                        <input type="submit" class="ink-button" value="Guardar">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
