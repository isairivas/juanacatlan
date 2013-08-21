<?php

/**
 * clase para manejar los errores derivados 
 * del servidor o rooteo, errores 404,500 etc
 *
 * @author uriel isai rodriguez rivas <isairivas@gmail.com>
 */
class Module_Error_Controller_Server extends Lib_Mvc_Controller {
    private $errorException = null;
    public function __construct($errorException) {
        parent::__construct();
        $this->errorException = $errorException;
    }
    
    public function index(){
        
    }


    public function code404(){
        // metodo para hacer algo en caso de que no exista la peticion buscada
        Application::setRenderView(FALSE);
        echo 'LO SENTIMOS LA PAGINA BUSCADA NO EXISTE <br/>';
        dump($this->errorException->getMessage());
    }
    
    public function desconocido(){
        Application::setRenderView(FALSE);
        echo 'LO SENTIMOS ERROR DESCONOCIDO';
    }
    
}

