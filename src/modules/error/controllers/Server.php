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
        $categoriasDB = new Lib_Mvc_Model('categorias_transparencia','id');
        $categorirasTransparencia = $categoriasDB->toArray($categoriasDB->get());
        Application::set('categorias_transparencia', $categorirasTransparencia);
    }
    
    public function index(){
        
    }


    public function code404(){
        // metodo para hacer algo en caso de que no exista la peticion buscada

        $request = array('module' => 'error','controller' => 'Server', 'action' => 'code404');
        Application::set('request', $request);
        
    }
    
    public function desconocido($errorException){
        Application::setRenderView(FALSE);
        echo 'LO SENTIMOS ERROR DESCONOCIDO <br/>';
        echo $errorException->getMessage();
    }
    
}

