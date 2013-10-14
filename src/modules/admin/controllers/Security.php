<?php
class Module_Admin_Controller_Security extends Module_Admin_Controller_Parent {
	function __construct() {
		parent::__construct();
	}
	
	public function login(){
	    Application::$view->setLayout('login');
            if($_SERVER['REQUEST_METHOD'] == 'POST' ){
                $usuario = null;
                $password = null;
                $encontrado = false;
                /* validaciones datos de ingreso */
                if(isset($_POST['registro']) && is_array($_POST['registro']) ){
                    $usuario = !empty($_POST['registro']['usuario'])?$_POST['registro']['usuario']:null;
                    $password = !empty($_POST['registro']['password'])?md5($_POST['registro']['password']):null;
                }
                
                if(is_null($usuario) || is_null($password) ){
                    // error datos vacios
                    echo 'los campos son obligatorios';
                }
                
                /* obtener todos los usuarios */
                $userDB = new Model_Usuario();
                $usuarios = $userDB->toArray($userDB->get());
                
                /* buscar si existe el usuario */
                foreach($usuarios as $user){

                    if($user['usuario'] == $usuario && $user['password'] ==  $password ){
                        $encontrado = true;
                        $_SESSION['linker_security'] = array(
                            'status' => 1,
                            'user'   => $user,
                            'rol'    => $user['rol_id']
                        );
                        parent::redirect('/admin/');
                    } 
                }
               
                /* no se encontro el usuario */
                if(!$encontrado){
                   // parent::redirect('/admin/security/login?noexiste');
                    echo '<br/>El usuario o password son incorrectos';
                }
                
            }
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
		 $this->redirect('/admin');
	}
}

