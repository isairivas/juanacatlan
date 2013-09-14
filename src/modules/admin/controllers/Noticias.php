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
        foreach ($registros as $key => $item){
            $registros[$key]['fecha'] = date('d/m/Y', strtotime($item['fecha']));
        }
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
            $noticias = new Model_Noticias();
            $data['fecha'] = Lib_Util_Date::formatTo('Y-m-d', $data['fecha']);
            $data['imagen'] = $noticias->uploadImagen();
            
            try {
                if( isset($data['id']) && is_numeric($data['id']) ){
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $data['imagen'] = $noticias->eliminaAntiguaImagen($data['imagen'], $data['id']);
                    $noticias->update($data, 'where id = '.$data['id']);
                } else {
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $noticias->insert($data);
                }
                   
            } catch(Exception $e) {}
            parent::redirect('/admin/noticias');
        }
    }

    public function delete() {
        Application::setRenderView(false);
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT) ){
            $id = $_GET['id'];
            $model = new Model_Noticias();
            $model->eliminaAntiguaImagen('true', $id);
            try{
               $model->deleteByPrimary($id);
           }catch(Exception $e){ dump($e->getMessage()); }
        }
        parent::redirect('/admin/noticias'); 
    }

    public function edit(){
        $id = null;
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT) ){
            $id = $_GET['id'];
        } else {
            parent::redirect('/admin/noticias');
        }
        
        $model = new Model_Noticias();
        $registro = $model->toArray($model->getByPrimary($id));
        $registro[0]['fecha'] = date('d/m/Y', strtotime($registro[0]['fecha']));
        $data = array(
            'action' => '/admin/noticias/save',
            'registro' => $registro[0]
        );
        Application::$view->setData($data);
    }
    
}

