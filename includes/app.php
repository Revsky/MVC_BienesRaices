<?php

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    // Conectarnos a la base de datos

    $db = conectarDB();

    /* 
    *** Cambiamos la referencia a ActiveRecord ya que ahora es la clase principal donde tiene almacenada la instancia de la base de datos
    */
    use Model\ActiveRecord;
    ActiveRecord::setDB($db);

?>