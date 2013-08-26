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
        $categoriasDB = new Lib_Mvc_Model('categorias_transparencia','id');
        $categorirasTransparencia = $categoriasDB->toArray($categoriasDB->get());
        Application::set('categorias_transparencia', $categorirasTransparencia);
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
      $categoriaId = null;
      
      /* obtener id de la categoria de la url */
      $params = explode('/', $_SERVER['REQUEST_URI']);
      if ( isset($params[3]) && is_numeric($params[3])){
          $categoriaId = $params[3];
      } else {
          parent::redirect(HOME);
      }
      
      $model = new Model_Transparencia();
      $registros = $model->getByCategoria($categoriaId);
      foreach ($registros as $key => $registro){
          if($registro['opcion_link'] == 'LINK'){
              $registros[$key]['link_descarga'] = $registro['link'];
          } else {
              $registros[$key]['link_descarga'] = HOME.'/frontend/index/download/'.$registro['archivo'];
          }
      }
      $data = array('registros' => $registros );
      Application::$view->setData($data);
    }
    
    public function download(){
        Application::setRenderView(false);
        $params = explode('/', $_SERVER['REQUEST_URI']);
        $name = PATH_UPLOADS_FILES_TRANSPARENCIA .$params[4];
        header("Content-disposition: attachment; filename=$params[4]");
        header("Content-type: application/octet-stream");
        readfile($name);
    }

}

