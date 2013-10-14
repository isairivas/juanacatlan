<?php

/**
 * Description of ServerImage
 *
 * @author isai

 */

require_once 'thumbnail.php';

class LIb_Util_ServerImage {
    public function upload($nameArrayForm,$nameInputForm,$path,$extensionesPermitidas = 'jpg,jpeg,png,bmp,gif'){
        
        if(empty($nameInputForm) ){
            throw new Exception('El nombre del input del formulario es obligatorio', -1);
        }
        if(empty($path) ){
            throw new Exception('El path del directorio a guardar es obligatorio ', -1);
        }
        if(!is_dir($path) ){
            throw new Exception('El path es invalido ', -1);
        }
        if ( empty($_FILES[$nameArrayForm]['name'][$nameInputForm]) ) {
            throw new Exception('No hay contenido ', 2);
        } 
        
        $chars = array('1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','y','z','w');
        $nameImagen = '';
        $length = '12';
        for($i = 0; $i < $length; $i++ ){
            $nameImagen .= $chars[rand(0, count($chars) - 1)];
        }
        
        $aPartes = explode('.', basename($_FILES[$nameArrayForm]['name'][$nameInputForm]));
        $extension = strtolower($aPartes[count($aPartes)-1]);
        $aExtensiones = explode(',',$extensionesPermitidas);
        if( !in_array($extension, $aExtensiones) ){
            throw new Exception('El archivo no esta permitido ', -2);
        }
        $extension = '.'.$extension;
        $subio = move_uploaded_file($_FILES[$nameArrayForm]['tmp_name'][$nameInputForm],$path.$nameImagen.$extension);
        if(!$subio){
            throw new Exception('No se puedo subir la imagen ', -3);
        } else {
            $obj = new Lib_Util_Img2Thumb($path.$nameImagen.$extension,120,120,$path.'thumb_admin_'.$nameImagen.$extension,1,255,255,255);
        }
        return $nameImagen.$extension;
    }
}
