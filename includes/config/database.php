<?php 
    declare( strict_types = 1 ); /* Usamos la declaración de tipos para mejorar la calidad de código */

    /* Debolvemos el tipo de dato que devolvera esta función */
    function conectarDB():mysqli{
        $db = new mysqli('localhost','root','root','bienes_racices_crud');
        $db->set_charset('utf8');

        if(!$db){
            echo "Error de Conexión con base de datos";
            exit; /* Detenemos la ejecución de código en caso de error par ano revela informaión delicada */
        }

        return $db;
    }

?>