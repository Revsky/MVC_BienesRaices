<?php 

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController{
    public static function crear(Router $router )
    {
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
    
            // validar que no haya campos vacios
            $errores = $vendedor->validar();
    
            // No hay errores
            if(empty($errores)) {
                $vendedor->guardar();
            }
    
        }

        $router->render('vendedores/crear',[
            'errores'=>$errores,
            'vendedor' => $vendedor,
        ]);
    }

    public static function actualizar( Router $router)
    {
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        $vendedor = Vendedor::find($id);

        if(!$id){
            header('Location: /admin');
        }
    
        // Obtener el arreglo del vendedor desde la base de datos
        $vendedor = Vendedor::find($id);
    
        $errores = Vendedor::getErrores();
    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            // sincronizar los valores
            $args = $_POST['vendedor'];
            // sincronizar objeto en memoria con lo que el usuario cambio
            $vendedor->sincronizar($args);
            // Validación
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar',[
            'errores'=>$errores,
            'vendedor'=>$vendedor,
        ]);
    }

    public static function eliminar( )
    {
        echo "eliminar Vendedor";
    }
}

?>