<?php 

namespace Controllers;

use MVC\Router;

class PropiedadController{

    public static function index(Router $router)
    {
        /* 
        ** Mandamos en un arreglo el llave=>valor de las variables que crearemos para esa vista, estas nos ayudaran a enviar parametros para mostrar
        */
        $router->render('propiedades/admin',[
            
        ]);
    }

    public static function crear()
    {
        echo "crear";
    }

    public static function actualizar()
    {
        echo "crear";
    }
}