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
class Lib_Core_Request {

    function __construct() {
        
    }

    public function getPost(){
        $params = array();
        foreach($_POST as $name => $value){
            $params[$name] = $value;
        }
        return $params;
    }
}

