<?php
/**
 * 
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 * 
 * description: framework sencillo para la creacion de sitios pequenos pero bien
 *               estructurados y con buenas practicas
 *  
 * 
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 * 
*/

/** 
* Clase padre de cualquier controlador, con procesos que ayudan a los controladores
*/
class Lib_Mvc_Controller {
	
	public function __construct() {
		
		
	}
	
	protected function isSigned(){
		if(isset($_SESSION['linker_signed_in']) && $_SESSION['linker_signed_in'] == 1 ){
			return true;
		} else {
			return false;
		}
	}
	protected function redirect($url){
		if(!headers_sent()){
			header('location: '.$url);
		} else {
			$html = '<script type="text/javascript"> window.location = "'.$url.'" </script>';
		}
		echo $html;
	}
	
	protected function invalidAccess(){
		die('Acceso incorrecto');
	}
	
	
	
}

