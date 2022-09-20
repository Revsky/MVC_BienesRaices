<?php 

    namespace MVC;

    class Router{
        
        public $rutasGET = [];
        public $rutasPOST = [];

        public function get($url, $fn)
        {
            $this->rutasGET[$url] = $fn;
        }

        /* 
        ** Comprobara las rutas de la pagina web para que exista el archivo y ademas el tipo de respuesta GET o POST para garantizar el funcionamiento de la web
        */
        public function comprobarRutas()
        {
            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if($metodo === 'GET'){
                $fn = $this->rutasGET[$urlActual] ?? null;
                
            }
            if($fn){
                // La URL existe
                call_user_func($fn,$this);

            }else{
                echo "Pagina No Encontrada";
            }
        }
    }
