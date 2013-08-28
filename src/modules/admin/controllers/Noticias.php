<?php

/**
 * controlador de las noticias
 *
 * @author isai
 */
class Module_Admin_Controller_Noticias extends Module_Admin_Controller_Parent{
    public function __construct() {
        parent::__construct();
        Application::set('view-title', 'Noticias'); //agregar el titulo principal a la pagina
        
         /* Agregar navegacion para noticias */
        $navegacion = array(
            'Contenido' => '/admin',
            'Noticias' => '/admin/noticias'
        );
        Application::set('navegation',$navegacion); //enviar la navegacion
        parent::setMenuActive('Contenidos', 'Noticias'); // indicar cual es el menu que estara activo
        
    }
    
    public function index(){
        $model = new Model_Noticias();
        $registros = $model->toArray($model->select(null,'fecha', 'DESC'));
        
        $data = array(
            'registros' => $registros
        );
        Application::$view->setData($data);
    }
    
    public function nuevo(){
        
        $data = array('action' => '/admin/noticias/save');
        
        Application::$view->setData($data);
        
        /* mostraos la vista de la accion edit */
        $request = Application::get('request'); 
        $request['action'] = 'edit'; 
        Application::set('request', $request); 
    }
    
    public function save() {
        Application::setRenderView(false);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST['registro'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['fecha'] = date('Y-m-d', strtotime($data['fecha']));
            $noticias = new Lib_Mvc_Model('noticias', 'id');
            try {
               $noticias->insert($data);    
            } catch(Exception $e) {
                //nada
            }
            parent::redirect('/admin/noticias');
        }
    }

    public function delete() {
        Application::setRenderView(false);
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT) ){
            $id = $_GET['id'];
            $model = new Lib_Mvc_Model('noticias', 'id');
            try{
               $model->deleteByPrimary($id);
           }catch(Exception $e){ dump($e->getMessage()); }
        }
        parent::redirect('/admin/noticias'); 
    }

    public function edit(){
        
    }
}

