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
class Lib_Util_String {
    
    public static function cleanTitle($title){
        $title = str_replace(' ', '-', $title);
        $title = str_replace('_', '-', $title);
        $title = preg_replace("/[^a-zA-Z\-\-0-9]/", "",$title);
        return $title;
    }
    
}


