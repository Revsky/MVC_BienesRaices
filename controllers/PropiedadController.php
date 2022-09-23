<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

use Intervention\Image\ImageManagerStatic as ImageInt;

class PropiedadController{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $resultado = $_GET['resultado'] ?? null;
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
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // crea una nueva instancoia
            $propiedad = new Propiedad($_POST['propiedad']);

            
            // Generar nombre unico
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";

            // Set imagen
            // Realiza un resize con intervetion

        
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = ImageInt::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
        
            $errores = $propiedad->validar();

            // Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                /* SUBIDA DE ARCHIVOS */

                // crear una carpeta
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES); // <- Crear la carpeta
                }

                // Guarda la imagen en servidor
                
                $image->save(CARPETA_IMAGENES.$nombreImagen);

                $resultado = $propiedad->guardar();

            
            }
        }
        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();

        // Método POST para actualziar
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Asignar los atributos 
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
            // Validacion 
            $errores = $propiedad->validar();
    
            // Generar nombre unico
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
    
            // Subida de archivos
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = ImageInt::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
            if(empty($errores)){
    
                // Almacenar la imagen
                if($_FILES['propiedad']['tmp_name']['imagen']){
       
                    $image->save(CARPETA_IMAGENES.$nombreImagen);
                }   
                $propiedad->guardar();
            }
    
        }    

        $router->render('/propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores,
        ]);
    }

    public static function eliminar(Router $router)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
    
                $tipo = $_POST['tipo'];
                if(validarContenido($tipo)){
                    // Obtener propiedad a eliminar
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }

            }
    
        }
    }
}