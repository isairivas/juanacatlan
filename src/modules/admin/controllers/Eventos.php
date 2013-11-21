<?php

/**
 * Controlador de Eventos
 */
class Module_Admin_Controller_Eventos extends Module_Admin_Controller_Parent{
	
    private $model;

    public function __construct(){
        parent::__construct();
		Application::set('view-title', 'Eventos'); //agregar el titulo principal a la pagina
        
         /* Agregar navegacion para noticias */
        $navegacion = array(
            'home' => '/admin',
            'Eventos' => '/admin/eventos'
        );
        Application::set('navegation',$navegacion); //enviar la navegacion
        parent::setMenuActive('Eventos', 'Eventos'); // indicar cual es el menu que estara activo
        $this->model = new Model_Eventos(); 
	}

	public function index() {
	    Application::set('view-subtitle', 'Listado de Eventos');
        
        $registros = $this->model->getAll();
        
        $data = array(
            'registros' => $registros
        );
        /* enviamos datos hacia la vista */
        Application::$view->setData($data);
	}

    public function nuevo() {
         $navegacion = array(
            'Home' => '/admin',
            'Eventos' => '/admin/eventos',
            'Nuevo'  => ''
        );
        Application::set('navegation',$navegacion);
        Application::set('view-subtitle', 'Nuevo Evento');
        $registro = array(array(
            'nombre' => '','fecha' => '','descripcion' => ''
        ));
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $id = $_GET['id'];
            $registro = $this->model->toArray($this->model->getByPrimary($id));
            $registro[0]['fecha'] = Lib_Util_Date::formatTo('d/m/Y', $registro[0]['fecha']);
        }
        $data = array(
            'action'     => '/admin/eventos/nuevo',
            'registro'   => $registro[0]
        );
        Application::$view->setData($data);

        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            $registro = $_POST['registro'];
            $registro['fecha'] = Lib_Util_Date::formatTo('Y-m-d', $registro['fecha']);
            $d = date_parse_from_format("Y-m-d", $registro['fecha'] );
            $registro['imagen'] = $this->model->uploadImagen();
            if(!$registro['imagen']){
                unset($registro['imagen']);
            }
            try{
                if(isset($registro['id']) && is_numeric($registro['id'])){
                    $id = $registro['id'];
                    unset($registro['id']);
                    $this->model->update($registro, " WHERE id = {$id} ");
                } else {
                    $this->model->insert($registro);
                }
                
            }catch(Exception $e){
            }
            parent::redirect('/admin/eventos');
        } 
    }

    public function delete() {
        Application::setRenderView(false);
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT) ){
            $id = $_GET['id'];
            $this->model->eliminaAntiguaImagen('true', $id);
            try{
               $this->model->deleteByPrimary($id);
           }catch(Exception $e){ dump($e->getMessage()); }
        }
        parent::redirect('/admin/eventos'); 
    }
}