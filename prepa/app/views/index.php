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
        <link rel="stylesheet" type="text/css" href="packages/css/login/login.css">
        
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
                        <a href="index.php">Portal de Servicio Social</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="contenedor" class="ink-grid">
            <div class="column-group">
                <div id="contenedorLogin" class="large-25 medium-25 small-100">
                    <form class="ink-form">
                        <fieldset>
                            <h4>Ingresar al portal</h4>
                            <hr>
                            <div class="control-group">
                                <label for="text-input">Matrícula</label> 
                                <div class="control">
                                    <!-- Agregados para funciones de php de validación de matricula-->
                                    <?php
                                    echo Form::open(array('url' => '/registro','method' => 'post')) ;
                                    echo Form::text('matricula', 'A00XXXXXX', array('id' => 'matricula', 
                                        'name' => 'matricula', 'pattern' => '[A|a][0-9]{8}', 'title' => 'La matrícula debe seguir el formato: A00XXXXXX', 'required'));
                                    echo  Form::close() ;
                                    ?>

                                </div>
                            </div>
                            <div class="control-group">
                                <label for="text-input">Contraseña</label> 
                                <div class="control">
                                    <!-- Agregados para funciones de php de validación de password-->
                               
                                    <?php 
                                    echo Form::open(array('url' => '/registro','method' => 'post')) ;
                                    echo Form::password('password', array('id' => 'password', 
                                        'name' => 'password', 'pattern' => '^.{6,}', 'title' => 'La contraseña debe contener al menos 6 caracteres', 'required'));
                                    echo  Form::close() ;
                                    ?>
                                </div>
                            </div>
                            <div class="control-group push-right">

                                <?php 
                                $matricula = '';
                                $password = '';
                                if (Input::has('matricula') || Input::has('password')) {
                                    $matricula = Input::get('matricula');
                                    $password = Input::get('password');
                                    //echo $matricula;
                                }
                                
                               // echo Form::open(array('url' => array('registro', $matricula)));

                                echo Form::open(array('url' => '/registro','method' => 'post')) ;
                                    echo Form::submit('Iniciar sesión', array('url' => 'registro','id' => 'botonLogin', 'class' => 'ink-button blue'));
                                echo  Form::close() ;
                                ?>,
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div id="contenedorAvisos" class="large-75 medium-75 small-100">
                    <div id="myCarousel" class="ink-carousel" data-auto-advance="5000" data-axix="x" data-initial-page="0" data-pagination="#carouselNav" data-swipe="true">
                        <!-- the carousel stage and slides -->
                        <ul class="stage column-group half-gutters">
                            <li class="slide large-100">
                                <img src="js/holder.js/900x400/auto/social" alt="">
                            </li>
                            <li class="slide large-100">
                                <img src="js/holder.js/900x400/auto/ink" alt="">
                            </li>
                            <li class="slide large-100">
                                <img src="js/holder.js/900x400/auto/industrial" alt="">
                            </li>
                            <li class="slide large-100">
                                <img src="js/holder.js/900x400/auto/gray" alt="">
                            </li>
                            <li class="slide large-100">
                                <img src="js/holder.js/900x400/auto/ink" alt="">
                            </li>
                        </ul>
                        <!-- the carousel navigation -->
                        <nav id="carouselNav" class="ink-navigation align-center">
                            <ul class="pagination grey"></ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="column-group">
                <div id="contenedorContacto" class="large-25 medium-25 small-100">
                    Contacto
                </div>
                <div id="contenedorAsociaciones" class="large-75 medium-75 small-100">
                    <div id="myCarousel" class="ink-carousel" data-auto-advance="5000" data-axix="x" data-initial-page="0" data-pagination="#asociacionesNav" data-swipe="true">
                        <!-- the carousel stage and slides -->
                        <ul class="stage column-group half-gutters">
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/gray" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/social" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/industrial" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/ink" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/gray" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/industrial" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/ink" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/social" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/gray" alt="">
                            </li>
                            <li class="slide large-20 medium-33 small-100">
                                <img src="js/holder.js/150x100/auto/industrial" alt="">
                            </li>
                        </ul>
                        <!-- the carousel navigation -->
                        <nav id="asociacionesNav" class="ink-navigation align-center">
                            <ul class="pagination grey"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
