<?php

/**
 *
 * Proyect Name:  nombre del proyecto en curso
 *
 * description: la descripcion de lo que realiza el controlador
 *
 *
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 *
 */
/*
 * Todo controlador debe extender de Lib_Mvc_Controller
 */
class Module_Frontend_Controller_Index extends Lib_Mvc_Controller {

    /**
     * En caso de que se soobrescriba el constructor siempre es necesario
     * ejecutar el constructor de la clase que hereda
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        Application::set('menu-active',1);
    }

    public function contacto() {
        echo 'contacto';
        Application::setRenderView(false);
    }
    
    public function transparencia(){
      Application::set('menu-active','3');

    }

}

