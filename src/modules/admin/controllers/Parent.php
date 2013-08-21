<?php

/**
 * controlador Padre del modulo de backend "admin"
 * aqui se pueden inciar configuraciones que afectana el modulo en general
 *
 * @author isai rivas
 */

class Module_Admin_Controller_Parent extends Lib_Mvc_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->validSession();
        $this->moduleConfigurations();
        $this->createMenu();
    }
    
    private function moduleConfigurations(){
        
        /* se elige el layout de mooncake (admin) */
        Application::$view->setLayout('mooncake');
        
        /* Se agrega titulo por default para el modulo */
        Application::set('view-title','Admin');
        Application::set('view-subtitle','Admin');
        
        /* Agregar navegacion default */
        $navegacion = array(
            'Home' => '/admin'
        );
        Application::set('navegation',$navegacion);
    }
    
    private function createMenu(){
        $general = new Lib_View_Component_Menu('Home','/','icon-home',true);
        $general->addChild(new Lib_View_Component_Menu('Home', '/admin', 'icol-application-home',true));
        
        $contenido = new Lib_View_Component_Menu('Contenidos','','icon-list');
        $transparencia = new Lib_View_Component_Menu('Transparencia','','icon-list');
        
        
        $conf = new Lib_View_Component_Menu('Opciones','/','icon-cogs',true);
        $conf->addChild(new Lib_View_Component_Menu('Usuarios', '/admin/usuarios', 'icol-user-business-boss'));
        $conf->addChild(new Lib_View_Component_Menu('Salir', '/admin/login/out', 'icol-disconnect',true));
        
        
        Application::set('__view-menu', array($general,$contenido,$transparencia,$conf));
    }
    
    private function validSession(){
        $isValid = FALSE;
        // valida si existe la session
        if(isset($_SESSION['linker_security']) && is_array($_SESSION['linker_security']) ){
            $sessionSecurity = $_SESSION['linker_security'];
            if($sessionSecurity['status'] == 1 ){
                $isValid = TRUE;
            }
        } 
        
        // valida si la peticion es el login para no redirigirlo y obtener retroalimentacion
        $request = Application::get('request');
        if($request['module'] == 'admin' && $request['controller'] == 'Security' && $request['action'] == 'login' ){
            $isValid = TRUE;
        }
        
        // en caso de que no sea valida mandarla al login
        if(!$isValid){
            $this->redirect(HOME.'/admin/security/login');
        }
    }
}

