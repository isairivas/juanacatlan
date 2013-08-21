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
* Archivo en el cual se incluiran las funciones
*/


/* 
* obtiene una cadena con la ruta correspondiente
* a determinada accion de algun controlador
*/
function go($section,$action,$params=''){
	return "index.php?section={$section}&action={$action}{$params}";
}


/* 
* convierte a float cualquier numero entero
*/
function d($number,$presicion = 2){
	
	if(is_null($number)){
		return $number;
	}
	if(empty($number)){
		return $number;
	}
	if(!is_numeric($number)){
		return $number;
	}
	
	if ( strpos($number,'.') === false){
		$decimales = '';
		for($i=0;$i<$presicion; $i++){
			$decimales .= 0;
		}
		return $number.'.'.$decimales;
	} else {
		
		if(count(explode('.',$number)) > 2 ){
			throw new Exception('Numero invalido: '.$number);
		}
		
		list($entero,$decimal) = explode('.',$number);
		$decimales = '';
		for($i=0;$i<$presicion; $i++){
			if( isset($decimal[$i]) && is_numeric($decimal[$i])){
				$decimales .= $decimal[$i];
			} else {
				$decimales .= 0;
			}
		}
		return $entero.'.'.$decimales;
	}
}

/**
 * 
 * @param da formato de moneda a determinada cantidad
 */
function money($precio){
	
	if (!(isset($precio) && is_numeric($precio) )){ 
		return null;
	} else {
		$precio_formateado = "$ ".number_format($precio, 2) ." MXN";
		return $precio_formateado;
	}
}

/* 
* crea un dum para mirar el contenido de alguna variable del tipo que sea
*/
function dump($mixed){
	echo '<pre>';
	var_dump($mixed);
	echo '</pre>';
}
