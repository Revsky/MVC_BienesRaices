<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true; /* <-- Para que muestre el header */
        $router->render('paginas/index',[
            'propiedades'=>$propiedades,
            'inicio'=>$inicio,
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros',[]);
    }

    public static function propiedades()
    {
        echo "desde propiedades";
    }

    public static function propiedad()
    {
        echo "desde propiedad";
    }

    public static function blog()
    {
        echo "desde blog";
    }

    public static function entrada()
    {
        echo "desde entrada";
    }

    public static function contacto()
    {
        echo "desde contacto";
    }
}

?>