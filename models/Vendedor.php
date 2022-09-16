<?php 

namespace App;

/* 
** Creamos una nueva clase para trabajar con los vendedores
*/

class Vendedor extends ActiveRecord{

    /* Sobreescribimos la variable tabla para asignarle un valor diferente cuando llamemos a esta clase */
    protected static $tabla = 'vendedores';

    protected static $columnasDB = ['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        if(!$this->nombre){
            self::$errores[] = "Debes añadir un nombre";
        }
        if(!$this->apellido){
            self::$errores[] = "Debes añadir un apellido";
        }
        if(!$this->telefono){
            self::$errores[] = "Debes añadir un telefono";
        }
        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            // preg_match nos permite usar expersiónes regulares
            self::$errores[] = "Formato no valido";

        }
        return self::$errores;
    }
}

?>