<?php 

    /* Debemos usar __DIR__ para que tome la ruta completa y no relativa par aque no nos marque algpun error */
    define('TEMPLATES_URL',__DIR__.'/templates');
    define('FUNCIONES_URL',__DIR__.'funciones.php');
    define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT']. '/imagenes/');

    function incluirTemplate( $nombre, $inicio = false){
        include  TEMPLATES_URL."/${nombre}.php";
    }

    function estaAutenticado() : void{
        session_start();

        if(!$_SESSION['login']){
            header('Location:/');
        }
    }

    function debuguear($elemento,$var_exit=0){
        echo "<pre>";
        var_dump($elemento);
        echo "</pre>";
        if($var_exit==0){
            exit;
        }
    }

    // Escapa el HTML
    function sanitizar($html){  
        $s = htmlspecialchars($html);
        return $s;
    }

    // Validar tipo de contenido
    function validarContenido($tipo){
        $tipos = ['vendedor','propiedad'];
        return in_array($tipo,$tipos);
    }    

    // Muestra los mensajes
    function mostrarNotificacion($codigo){
        $mensaje = '';

        switch($codigo){
            case 1:
                $mensaje = "Creado Correctamente";
                break;
            case 2:
                $mensaje = "Actualizado Correctamente";
                break;
            case 3:
                $mensaje = "Eliminado Correctamente";
                break;
            default:
                $mensaje = false;
                break;

        }

        return $mensaje;
    }
?>