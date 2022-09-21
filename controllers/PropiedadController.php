<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $resultado = null;
        /* 
        ** Mandamos en un arreglo el llave=>valor de las variables que crearemos para esa vista, estas nos ayudaran a enviar parametros para mostrar

        ** Este arreglo define cada variable que estara 
        */
        $router->render('propiedades/admin',[
            'propiedades' => $propiedades,
            'resultado' => $resultado,
        ]);
    }

    public static function crear(Router $router)
    {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
        ]);
    }

    public static function actualizar()
    {
        echo "crear";
    }
}