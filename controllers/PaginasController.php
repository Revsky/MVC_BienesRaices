<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

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

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        // Buscar propiedad
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad',[
            'propiedad'=>$propiedad,
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog',[]);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada',[

        ]);
    }

    public static function contacto(Router $router)
    {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){


           
            $respuestas = $_POST['contacto'];
            
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // configurar smtp <- Protocolo para envio de emials
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '6aba654a09bc2f';
            $mail->Password = '003975f9c016e1';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com','BienesRaices.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje - BienesRaices.com';

            // Habilita HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '.$respuestas['nombre'].'</p>';
            $contenido .= '<p>Email: '.$respuestas['email'].'</p>';
            $contenido .= '<p>Telefono: '.$respuestas['telefono'].'</p>';
            $contenido .= '<p>Mensaje: '.$respuestas['mensaje'].'</p>';
            $contenido .= '<p>Vende o compra: '.$respuestas['tipo'].'</p>';
            $contenido .= '<p>Presupuesto: $'.$respuestas['precio'].'</p>';
            $contenido .= '<p>Prefiere ser contactado por: '.$respuestas['contacto'].'</p>';
            $contenido .= '<p>Fecha: '.$respuestas['fecha'].'</p>';
            $contenido .= '<p>Hora: '.$respuestas['hora'].'</p>';
            $contenido .= '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto sin HTML"; //<- Esto es para quien no tiene soporte para HTML en correo

            // Enviar el email
            if($mail->send()){
                echo "Mensaje enviado correctamente";
            }else{
                echo "Ocurrio un error al enviar el mensaje";
            }

        }
        
        $router->render('paginas/contacto',[]);
    }
}

?>