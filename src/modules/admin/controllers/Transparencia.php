<?php

/**
 * Controlador para los registros de transparencia
 *
 * @author isai rivas
 */
class Module_Admin_Controller_Transparencia extends Module_Admin_Controller_Parent {
    
    public function __construct() {
        parent::__construct();
        Application::set('view-title', 'Transparencia'); //agregar el titulo principal a la pagina
        
         /* Agregar navegacion para transparencia */
        $navegacion = array(
            'Home' => '/admin',
            'Transparencia' => '/admin/transparencia'
        );
        Application::set('navegation',$navegacion); //enviar la navegacion
        parent::setMenuActive('Transparencia', 'Archivos'); // indicar cual es el menu que estara activo
    }
    
    public function index(){
        
        Application::set('view-subtitle', 'Listado de registros');
        $model = new Model_Transparencia(); 
        $registros = $model->getAll();
        $data = array(
            'registros' => $registros
        );
        /* enviamos datos hacia la vista */
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
            'categorias' => $categoriasDB->toArray($categoriasDB->get()),
            'action'     => '/admin/transparencia/nuevo'
        );
        Application::$view->setData($data);

        /* si es peticion post agregar nuevo registro */
        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            $model = new Model_Transparencia();
            $registro = $_POST['registro'];
            $registro['created_at'] = date('Y-m-d H:i:s');
            try{
                $model->insert($registro);
            }catch(Exception $e){
            }
            parent::redirect('/admin/transparencia');
        } 
    }
    
    public function delete(){
        Application::setRenderView(false);
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT) ){
            $id = $_GET['id'];
            $model = new Model_Transparencia();
            try{
               $model->deleteByPrimary($id);
           }catch(Exception $e){ dump($e->getMessage()); }
        }
        parent::redirect('/admin/transparencia');
    }
    
    public function edit(){
        $id = null;
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT) ){
            $id = $_GET['id'];
        } else {
            parent::redirect('/admin/transparencia');
        }
        
        $navegacion = array(
            'Home' => '/admin',
            'Transparencia' => '/admin/transparencia',
            'Editar'  => ''
        );
        Application::set('navegation',$navegacion);
        Application::set('view-subtitle', 'Editar Registro');

        $categoriasDB = new Lib_Mvc_Model('categorias_transparencia', 'id');
        $model = new Model_Transparencia();
        $registro = $model->toArray($model->getByPrimary($id));
        $data = array(
            'categorias' => $categoriasDB->toArray($categoriasDB->get()),
            'registro'   => $registro[0],
            'action'     => '/admin/transparencia/update'
        );
        Application::$view->setData($data);
        /* truco para usar la vista de nuevo en la accion edit */
        $request = Application::get('request'); // obtenenos la datos de peticion a procesar
        $request['action'] = 'nuevo'; // reemplazar la accion edit por nuevo (que es la vista que queremos usar)
        Application::set('request', $request); // enviamos el registro modificado
           
    }
    
    public function update(){
        Application::setRenderView(false);
        /* si es una peticion post actualizamos el registro */
        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            $model = new Model_Transparencia();
            $nuevoRegistro = $_POST['registro'];
            $nuevoRegistro['updated_at'] = date('Y-m-d H:i:s');
            $idEditar = $nuevoRegistro['id'];
            unset($nuevoRegistro['id']);
            try{
                $model->update($nuevoRegistro, ' WHERE id = '.$idEditar);
            }catch(Exception $e){ dump($e->getMessage()); exit;
            }
        }
        parent::redirect('/admin/transparencia');
    }
    
} // end class


