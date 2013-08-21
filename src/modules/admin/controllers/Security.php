<?php
class Module_Admin_Controller_Security extends Module_Admin_Controller_Parent {
	function __construct() {
		parent::__construct();
	}
	
	public function login(){
	    
	}
	
	public function in(){
		$error = false;
		$user = null;
		$password = null;
		
		if( isset($_POST['usuario']) && !empty($_POST['usuario']) ){
			$user = $_POST['usuario'];
		}else {
			$error .= 'El usuario es obligatorio. <br/> ';
		}
		
		if( isset($_POST['password']) && !empty($_POST['password']) ){
			$password = $_POST['password'];
		} else {
			$error .= 'El Password es obligatorio. <br/> ';
		}
		
		if(!$error){
			$usuarioDB = new Model_Usuario();
			try{
				$user = $usuarioDB->autenticate($user, $password);
                $_SESSION['linker_signed_in'] = 1;
                $_SESSION['user'] = $user;
                $this->redirect('index.php?section=usuarios');
			}catch(Exception $e){
				$error = $e->getMessage();
			}
		}
		
		
		parent::renderView('login',array('error' => $error ));
	}
	
	public function logout(){
		unset($_SESSION['linker_signed_in']);
		unset($_SESSION['user']);
		 session_destroy();
		 $this->redirect('index.php');
	}
}

