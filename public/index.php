<?php 

    /* Este sera nuestro archivo principal y sera el que se encargara de llamar a todo el MVC */

    require_once __DIR__ . '/../includes/app.php';

    use MVC\Router;
    use Controllers\PropiedadController;
    use Controllers\VendedorController;

    $router = new Router();


    /* Funciones de tipo GET */

    /* 
    ** PropiedadController::class <- Define desde que clase viene desde ese namespace que en este caso es la clase PropiedadController, despues asignamos el método de esa clase que vamos a llamar el cual es index
    */
    $router->get('/admin',[PropiedadController::class,'index']);

    // Propiedades
    $router->get('/propiedades/crear',[PropiedadController::class,'crear']);
    $router->post('/propiedades/crear',[PropiedadController::class,'crear']);

    $router->get('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
    $router->post('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
    
    $router->post('/propiedades/eliminar',[PropiedadController::class,'eliminar']);

    // Vendedores 
    $router->get('/vendedores/crear',[VendedorController::class,'crear']);
    $router->post('/vendedores/crear',[VendedorController::class,'crear']);

    $router->get('/vendedores/actualizar',[VendedorController::class,'actualizar']);
    $router->post('/vendedores/actualizar',[VendedorController::class,'actualizar']);
    
    $router->post('/vendedores/eliminar',[VendedorController::class,'eliminar']);



    $router->comprobarRutas(); 
?>