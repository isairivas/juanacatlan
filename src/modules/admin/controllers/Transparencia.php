<?php

/**
 * Controlador para los registros de transparencia
 *
 * @author isai rivas
 */
class Module_Admin_Controller_Transparencia extends Module_Admin_Controller_Parent {
    
    private $_pathUploadsFiles;
    
    public function __construct() {
        parent::__construct();
        Application::set('view-title', 'Transparencia'); //agregar el titulo principal a la pagina
        
         /* Agregar navegacion para transparencia */
        $navegacion = array(
            'Home' => '/admin',
            'Transparencia' => '/admin/transparencia'
        );
        Application::set('navegation',$navegacion); //enviar la navegacion
        parent::setMenuActive('Transparencia', 'Transparencia'); // indicar cual es el menu que estara activo
        $this->_pathUploadsFiles = PATH_UPLOADS_FILES_TRANSPARENCIA;
    }
    
    public function index(){
        
        Application::set('view-subtitle', 'Listado de registros');
        $model = new Model_Transparencia(); 
        $registros = $model->getAll();
        $colores = array('','#C5E3E1','#E3EBDF','#F5F0CE','#F5CEDB','#cccccc');
        foreach ($registros as $key => $registro){
            $registros[$key]['color'] = $colores[$registro['categoria_transparencia_id']];
        }
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
            $imagen = $this->uploadsImages('archivo', $this->_pathUploadsFiles);
            $registro['archivo'] = $imagen;
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
            if(!isset($nuevoRegistro['is_subcategoria'])){
                $nuevoRegistro['is_subcategoria'] = 'FALSE';   
            }
            $idEditar = $nuevoRegistro['id'];
            $file = $this->uploadsImages('archivo', $this->_pathUploadsFiles);
            if( !empty($file) ){
                /* eliminar antigua imagen */
                $nuevoRegistro['archivo'] = $file;
                $antiguoRegistro = $model->toArray($model->getByPrimary($idEditar));
                @unlink($this->_pathUploadsFiles. $antiguoRegistro[0]['archivo'] );
            }
            unset($nuevoRegistro['id']);
            try{
                $model->update($nuevoRegistro, ' WHERE id = '.$idEditar);
            }catch(Exception $e){ dump($e->getMessage()); exit;
            }
        }
        parent::redirect('/admin/transparencia');
    }
    
     /**
     * @name uploadsImages
     * @description Sube las imagenes que se encuentren en el formulario al servidor
     */
    private function uploadsImages($nombreCampo,$path){
        $serverImage = new Lib_Util_ServerImage();
        $nombreImagen = '';
        $extensiones = 'jpg,jpeg,png,bmp,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,zip';
        try{
            $nombreImagen = $serverImage->upload('registro',$nombreCampo,$path,$extensiones);
           }catch(Exception $e){
               if($e->getCode() == 2 ){
                   return '';
               }
           }
           return $nombreImagen;
    }
    
} // end class


