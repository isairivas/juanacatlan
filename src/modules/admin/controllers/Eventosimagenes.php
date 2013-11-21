<?php
/**
 * controlador de las imagenes por cada evento
 *
 * @author isai rivas
 */
class Module_Admin_Controller_Eventosimagenes extends Module_Admin_Controller_Parent  {
    
    private $idEvento = null;
    
    public function __construct(){
        if(isset($_GET['evento']) && is_numeric($_GET['evento'])){
            $this->idEvento = $_GET['evento'];
        } else {
            exit('Acceso incorrecto');
        }
        parent::__construct();
        Application::set('view-title', 'Evento - Imagenes'); //agregar el titulo principal a la pagina
        
         /* Agregar navegacion para las imagenes del evento */
        $navegacion = array(
            'home' => '/admin',
            'Eventos' => '/admin/eventos',
            'Imagenes' => ''
        );
        Application::set('navegation',$navegacion); //enviar la navegacion
        parent::setMenuActive('Eventos', 'Imagenes'); // indicar cual es el menu que estara activo
    }
    
    public function index(){
        
    }
}

