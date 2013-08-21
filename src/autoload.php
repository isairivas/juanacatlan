<?php
/**
 *
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 *
 * description: framework sencillo para la creacion de sitios pequeños pero bien
 *               estructurados y con buenas practicas
 *
 *
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 *
 */
 
function __autoload($className) {
	$dirs = explode('_', $className);
	$file = $dirs[count($dirs)-1];
	unset($dirs[count($dirs)-1]);
	$path = '';
	foreach($dirs as $item ){
		$dir = '';
		switch($item){
			case 'Model':      $dir = 'models';  break;
			case 'Controller': $dir = 'controllers';  break;
			case 'Module':     $dir = 'modules'; break;
			default: $dir = $item; break;
		}
		$path .= strtolower($dir).'/';
	}
    include $path.$file. '.php';
}
