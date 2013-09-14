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


/**
 * @name cutTextWithTags
 * @description recorta un texto respetando las etiquetas  
 * @author  Isai rivas 
 * @param type String $texto
 * @param type Int $longitud
 * @return string
 */
function cutTextWithTags($texto, $longitud = 500) {
    
    if (empty($texto) ) { 
    	return $texto; 
    }
    
    if (!filter_var($longitud,FILTER_VALIDATE_INT) ) {
        throw new Exception('La longitud es invalida, debe ser un numero entero');
    }
    
    if ( (strlen($texto) > $longitud ) ) {
        $pos_espacios = strpos($texto, ' ', $longitud) - 1;
        if ($pos_espacios > 0) {
            $caracteres = count_chars(substr($texto, 0, ($pos_espacios + 1)), 1);
            if ( isset($caracteres[ord('<')]) && isset($caracteres[ord('>')]) && $caracteres[ord('<')] > $caracteres[ord('>')]) {
                $pos_espacios = strpos($texto, ">", $pos_espacios) - 1;
            }
            $texto = substr($texto, 0, ($pos_espacios + 1));
        }
        if (preg_match_all("|(<([\w]+)[^>]*>)|", $texto, $buffer)) {
            if (!empty($buffer[1])) {
                preg_match_all("|</([a-zA-Z]+)>|", $texto, $buffer2);
                if (count($buffer[2]) != count($buffer2[1])) {
                    $cierrotags = array_diff($buffer[2], $buffer2[1]);
                    $cierrotags = array_reverse($cierrotags);
                    foreach ($cierrotags as $tag) {
                        $texto .= '</' . $tag . '>';
                    }
                }
            }
        }
    }
    return $texto;
    }

    function cleanTitle($title){
        $title = str_replace(' ', '-', $title);
        $title = str_replace('_', '-', $title);
        $title = preg_replace("/[^a-zA-Z\-\-0-9]/", "",$title);
        return $title;
    }
    
    function toDMY($fecha){
    	return date('d/m/Y', strtotime($fecha));
    }