<?php

/**
 * Controlador para los registros de transparencia
 *
 * @author isai rivas
 */
class Module_Admin_Controller_Transparencia extends Module_Admin_Controller_Parent {
    public function __construct() {
        parent::__construct();
        Application::set('view-title', 'Transparencia');
         /* Agregar navegacion para transparencia */
        $navegacion = array(
            'Home' => '/admin',
            'Transparencia' => '/admin/transparencia'
        );
        Application::set('navegation',$navegacion);
        parent::setMenuActive('Transparencia', 'Archivos');
    }
    
    public function index(){
        
        Application::set('view-subtitle', 'Listado de registros');
        $model = new Model_Transparencia();
        $registros = $model->getAll();
        $data = array(
            'registros' => $registros
        );
        Application::$view->setData($data);
    }
    
    public function nuevo(){
        $navegacion = array(
            'Home' => '/admin',
            'Transparencia' => '/admin/transparencia',
            'Nuevo'  => ''
        );
        Application::set('navegation',$navegacion);
        Application::set('view-subtitle', 'Nuevo Registro');
        $categoriasDB = new Lib_Mvc_Model('categorias_transparencia', 'id');
        $data = array(
            'categorias' => $categoriasDB->toArray($categoriasDB->get())
        );
        Application::$view->setData($data);

        /* si es peticion post agregar nuevo registro */
        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            echo 'es nuevo registro '; 
            dump($_POST);
            exit;
        } 
        
    }
}


