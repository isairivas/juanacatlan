<?php

/**
 * 
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 * 
 * description: framework sencillo para la creacion de sitios pequenos pero bien
 *               estructurados y con buenas practicas
 *  
 * 
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 * 
 */
/*
 * Clase encargada para despachar los controladores y las acciones
 * segun corresponda la url
 */
class Lib_Core_Rooter {

    protected $defaultController = LINKER_DEFAULT_CONTROLLER;
    protected $defaultAction = LINKER_DEFAULT_ACTION;
    protected $defaultModule = LINKER_DEFAULT_MODULE;
    protected $controller = '';
    protected $action = '';
    protected $module = '';

    function __construct() {

        $this->controller = $this->defaultController;
        $this->action = $this->defaultAction;
        $this->module = $this->defaultModule;
        
        $this->readRequest();
    }

    /**
     * despacha la peticion
     */
    public function dispatch() {
        
        $fileController = PATH_APP . '/modules/' . $this->module . '/controllers/' . $this->controller . '.php';
        if (file_exists($fileController)) {
            $controller = $this->controller;
        } else {
            throw new Exception('File: '.$fileController.' Not Found',404);
        }

        // registrar el controlador y la accion
        $request = array('module' => $this->module, 'controller' => $controller, 'action' => $this->action);
        Application::set('request', $request);

        $classControllerName = 'Module_' . ucfirst($this->module) . '_Controller_' . $controller;
        
        $classInfo = new ReflectionClass($classControllerName);
        if($classInfo->hasMethod($this->action)){
            $action = $classInfo->getMethod($this->action);
            $object = $classInfo->newInstance();
            $action->invoke($object);
        } else {
            throw new Exception('Action: '.$this->action.' Not Found ',404);
        }
    }

    /**
     * se encarga de leer la peticion 
     * para redirigir la aplicacion
     */
    public function readRequest() {

        if (LINKER_ROOTER_URLAMIGABLES) {
            $this->readRequestFriendly();
        } else {
            $this->readRequestGetParams();
        }
    }
    
    /**
     * lee los parametros de peticion para rootear en base
     * a parametros via GET 
     */
    private function readRequestGetParams() {
        if (isset($_GET['section'])) {
            $this->controller = ucfirst($_GET['section']);
        }
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
        if (isset($_GET['module'])) {
            $this->module = $_GET['module'];
        }
    }
    
    /**
     * lee los parametros de peticion para rootear 
     * en base a parametros de url amigable
     */
    private function readRequestFriendly() {
        
        /* obtener las variable de forma proceso basico
         *  de forma : /module/controller/action
         */
        $lModule = null;
        $lSection = null;
        $lAction = null;
        $params = explode('/',$_SERVER['REQUEST_URI']);
        
        if(isset($params[1])){
           $lModule = $params[1];// el primer segmento es el modulo 
        }
        if(isset($params[2])){
            $lSection = $params[2]; // el segundo segmento es la seccion
        }
        if(isset($params[3])){
           $lAction = $params[3]; // el tercer segmento es la accion 
        }
        
        
        /* limpiar y separar parametros (en caso de que tenga) de la accion */
        $partesParams = explode('?', $lAction);
        $lAction = $partesParams[0]; 
        
        /* si son validos tomarlos como parametros para rootear */
        if($this->isSegmentRequestValid($lModule)){
            $this->module = $lModule;
        }
        if($this->isSegmentRequestValid($lSection)){
            $this->controller = ucfirst($lSection);
        }
        if($this->isSegmentRequestValid($lAction)){
            $this->action = $lAction;
        }
        
        
        
        /* 
         * obtener los valores de la peticion a travez
         * de las url amigables personalizadas
         */
        
        $urls = Application::$urls;
        $segmento1 = $params[1];
        if( !empty($urls) && is_array($urls)){
            foreach ($urls as $url => $parametros){
                if( $segmento1 == $url  ){
                    $this->module = $parametros['module'];
                    $this->controller = $parametros['controller'];
                    $this->action = $parametros['action'];
                    break;
                } else {

                }
            }
        } 
        
    }
    
    /**
     * despachar errores
     * @param type $errorCode
     */
    public function dispatchError($errorException){
        $error = new Module_Error_Controller_Server($errorException);
        switch($errorException->getCode()){
            case 404:
                $error->code404();
                break;
            default: $error->desconocido(); break;
        }
    }
    
    /**
     * evalua si un segmento de la url a rootear es correcto
     * @param type $segment
     * @return boolean
     */
    private function isSegmentRequestValid($segment){
        if(empty($segment)){
            return FALSE;
        }
        
        return TRUE;
    }
    
} // end class
