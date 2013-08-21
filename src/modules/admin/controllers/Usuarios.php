<?php
class Module_Admin_Controller_Usuarios extends Lib_Mvc_Controller  {
	public function __construct() {
		parent::__construct();
	
		if(!parent::isSigned()){
			$request = Application::get('request');
			if( !($request['controller'] == 'Security' )){
				parent::redirect('?section=security&action=login');
			}
		}
	
		$data = array(
				'menu_active' => 'usuarios'
		);
	
	
		parent::renderView('includes/header');
		parent::renderView('includes/menu',$data);
	}
	
	public function index(){
	
		$usuariosDB = new Model_Usuario();
		//$usuarios = $usuariosDB->getUsers();
	
		foreach ($usuariosDB->getUsers() as $usuario){
			$usuarios[] = $usuario;
		}
	
		$data = array('usuarios' => $usuarios);
		parent::renderView('usuarios/index',$data);
		parent::renderView('includes/footer');
	}
	
	public function edit(){
		$usuariosDB = new Model_Usuario();
	
	
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			$id = $_GET['id'];
		} else {
			die('acceso incorrecto');
		}
		$usuario = $usuariosDB->getUsers($id);
		$data = array(
				'usuario' => $usuario[0],
				'title'  => 'Editar usuario',
				'action' => go('usuarios','update'),
				'isUserController' => true,
				'passwordRequered' => false
		);
		parent::renderView('usuarios/edit',$data);
		parent::renderView('includes/footer');
	}
	
	public function nuevo(){
	
	
		$data = array('title' => 'Nuevo Usuario',
				'action' => go('usuarios','add'),
				'isUserController' => true,
				'usuario' => array('rol_id' => 2),
				'passwordRequered' => true
		);
		parent::renderView('usuarios/edit',$data);
		parent::renderView('includes/footer');
	}
	
	public function add(){
		$usuariosDB = new Model_Usuario();
		$registro = $_POST;
		$registro['password'] = md5($_POST['password']);
		try{
			$usuariosDB->insert($registro);
		}catch(Exception $e){ dump($e->getMessage()); }
		$this->redirect(go('usuarios','index'));
	}
	
	public function update(){
		$usuariosDB = new Model_Usuario();
		$registro = $_POST;
		if(!empty($registro['password'])){
			$registro['password'] = md5($_POST['password']);
		} else {
			unset($registro['password']);
		}
		$id = $registro['id'];
		unset($registro['id']);
		try{
			$usuariosDB->update($registro," WHERE id={$id} ");
		}catch(Exception $e){}
		$this->redirect(go('usuarios','index'));
	
	}
	
	public function delete(){
	
		if(isset($_GET['id']) && is_numeric($_GET['id']) ){
			$id = $_GET['id'];
			$usuariosDB = new Model_Usuario();
			$result = $usuariosDB->deleteUser($id);
			$this->redirect(go('usuarios','index'));
		} else {
			parent::invalidAccess();
		}
	}
	
	public function roles(){
	
		if( !(isset($_GET['id']) && is_numeric($_GET['id']) ) ){
			parent::invalidAccess();
		}
	
		$id = $_GET['id'];
		$usuariosDB = new Model_Usuario();
		$usuarios = $usuariosDB->getUsers($id);
		$roles = $usuariosDB->getRoles($id);
	
		$rolesDB = new Lib_Mvc_Model('roles','id');
		$allRoles = $rolesDB->get();
		$data = array(
				'usuario' => $usuarios[$id],
				'roles'   => $roles,
				'allRoles' => $allRoles
		);
	
		parent::renderView('usuarios/roles',$data);
		parent::renderView('includes/footer');
	}
	
	public function roles_delete(){
		if( !(isset($_GET['id']) && is_numeric($_GET['id']) ) ){
			parent::invalidAccess();
		}
		$id = $_GET['id'];
		$user = $_GET['user'];
		$usuariosDB = new Model_Usuario();
		$usuariosDB->deleteRol($id);
		$this->redirect(go('usuarios','roles','&id='.$user));
	}
	
	public function roles_add(){
		$registro = $_POST;
		$usuariosDB = new Model_Usuario();
		$usuariosDB->addRol($registro['usuarios_id'], $registro['roles_id']);
		$this->redirect(go('usuarios','roles','&id='.$registro['usuarios_id']));
	}
        
        public function test(){
            Application::$view->render(FALSE);
            echo 'hola test usuario';
        }
}

