<?php 

    /* Esto previene que creemos una sesión ya iniciada */
    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <!-- 
        Usamos un operador ternario representado con el simbolo ?
        
        El metodo isset permite evaluar si la variable esta definida y si esta tomarla en cuenta, esto permite qu eno obtengamos una advertencia que revele información importante del sistema

        Por ultimo el operador ternario es la evaluación donde indicamos que si va variable $inicio existe y esta como true entonces agregamos el texto inicio que es el nombre de una class y si no simplemente no hacemos nada

        ** Actualización
            - Como incluimos la función incluir template y ahi evaluamos el estado de la variable podmeos remover la comprobación de Isset

        ** Actualización: Agregamos / a la ruta de los archivos que esten dentro de la carpeta build para que funcione en cualquier parte del proyecto
     -->
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
