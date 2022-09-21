<?php 

    /* Esto previene que creemos una sesión ya iniciada */
    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? null;

    if(!isset($inicio)){
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio':'' ;?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logo" width="90px" height="90px">
                </a>

                 <!-- Creando menu de hamburgesa -->
                 <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth):?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif?>
                    </nav>
                </div>

            </div><!-- .barra -->
               
        </div>
    </header>

    <!-- Usamos la variable $contenido que definimos en el Router.php este módificara el contenido del main del HTML -->
    <?php echo $contenido?>
                            
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </div>
        </div>

        <?php 
            $fecha = date('Y'); /* Obtenemos el año actual para actualizarlo en automatico */
        ?>
        <p class="copyright">Todos los Derechos Reservados <?php echo $fecha ?> &copy;</p>

    </footer>

    <script src="../build/js/bundle.js"></script>

</body>
</html>