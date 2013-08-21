<?php

/**
 * controlador de pruebas
 *
 * @author isai rivas
 */
class Module_Admin_Controller_Tests extends Lib_Mvc_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
    }
    
    public function url(){
        Application::setRenderView(FALSE);
        echo 'hola url amigable';
    }
    
    public function layout(){
        Application::$view->setLayout('mooncake');
    }
}

