<?php 

namespace App;

/* 
** Ahora esta sera nuestra clase principal
*/

class ActiveRecord{

    // Base de datos
    /* 
    ** Definimos la conexión como protected ya que solo accederemos a ella desde la clase,
    ** Definimos static ya que no requeremimos crear diferentes instancias de la base de datos, por que las credenciales de acceso son las mismas.
    *** Como $db no forma parte del constructor y es static esta no se va a reescribir cuando creemos la instancia de la clase en difernetes lugares
    */
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Errores
    protected static $errores = [];

    
    /* 
    **** Definimos las variables locales en cada clase ****
    */


    /* 
    **** Definimos el constructor en cada clase para que cree sus objetos respectivamente ****
    */

    /// Métodos de acceso a la base de datos

    public static function setDB($database): void
    {
        // Todo lo que sea declarado como static podemos acceder a el ya sea con self:: o bien nombreClase::
        /* 
        *** EN este caso no es necesario cambiar el tipo a self debido a que no importa la clase la instancia de la base de datos para conectarse siempre sera la misma        
        */
        self::$db = $database;
    }

    // Creamos una función que nos permita iterar en un arreglo para asignar el valor que hemos agregado en el formualrio a los atributos
    public function atributos( ): array
    {
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizamos los atributos para que no inyecten código de otro tipo
    public function sanitizarAtributos(): array
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key=>$value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;

    }

    // Validación de errores
    public static function getErrores():array{
        return static::$errores;
    }

    // Subida de archivos
    public function setImagen($imagen){

        // Elimina la imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        // Asignar el nombre de la imagen al atributo
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Borrar archivos
    public function borrarImagen(): void
    {
        //comprobar si existe el archivo en el servidor
        $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES.$this->imagen);
        }

    }

    public function validar( )
    {
        static::$errores = [];
        return static::$errores;
    }

    public function guardar(){
        
        if(is_null($this->id)){
            // crea
            $this->crear();
        
        }else{
            // actualiza
            $this->actualizar();
            
        }

    }

    public function actualizar(){
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key=>$value){
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE ".static::$tabla." SET ";
        $query.= join(', ',$valores); 
        $query.= " WHERE id = '". self::$db->escape_string($this->id)."' ";
        $query.= " LIMIT 1";

        $resultado = self::$db->query($query);
        
        if ($resultado) {
            // Redireccionar al usuario para dar la sensación de que se guardo

            header('Location:/admin?resultado=2');
        }else{
            echo "Ocurrio un error ";
        }
    }

    public function crear( )
    {

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO ".static::$tabla." ( ";
        $query .= join(', ',array_keys($atributos)); // Genera un string con las llaves de arreflo
        $query .= " ) VALUES (' ";
        $query .= join("', '",array_values($atributos));
        $query .= " ')";

        // Ejecuta la acción en la base de datos
        $resultado = self::$db->query($query);

        // Mensaje de exito u error
        if ($resultado) {
            // Redireccionar al usuario para dar la sensación de que se guardo

            header('Location:/admin?resultado=1');/* <- Permite indicar en que seccion del proyecto queremos redireecionar, solo funciona si hay un HTML previo y no es recomendable usarla frecuentemente ya que puede haber un error de redirecciones */
        }else{
            echo "Ocurrio un error al guardar información";
        }
        
    }

    // ELiminar un registro
    public function eliminar(): void
    {
        // Elimina la propiedad
        $query = "DELETE FROM ".static::$tabla." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    /// Lista Todas las Propiedades
    public static function all( )
    {
        /* Indicamos static::$tabla para que busque el valor de la variable tabla en este caso, en la clase donde se este llamando que puede ser propiedad o vendedor según sea el caso */

        $query = "SELECT * FROM ".static::$tabla;
        $resultado = self::consultarSQL($query);
        
        return $resultado;
        
    }

    /// Obtiene N registros
    public static function get($cantidad)
    {
        /* Indicamos static::$tabla para que busque el valor de la variable tabla en este caso, en la clase donde se este llamando que puede ser propiedad o vendedor según sea el caso */

        $query = "SELECT * FROM ".static::$tabla . " LIMIT ".$cantidad;
        $resultado = self::consultarSQL($query);
        
        return $resultado;
        
    }


    // Buscar una propiedad por su ID
    public static function find($id){
        $query = "SELECT * FROM ".static::$tabla." WHERE id=${id}";

        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {

        // Consular la base de datos
        $resultado = self::$db->query($query);
        
        // Itearar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
            
        }

        // Liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Tomas los arreglos de la base de los arreglos y los convierte en objetos
    protected static function crearObjeto($registro)
    {
        $objeto = new static; // <- Crea nuevos objetos de la clase donde se llame

        foreach($registro as $key=>$value)
        {
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincronizar el objeto en memoria con los cambios realizados por el usuairo
    public function sincronizar( $args = [])
    {
        foreach($args as $key=>$value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
    
}

?>