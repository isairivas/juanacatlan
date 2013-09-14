<?php
/**
 * Modelo para la snoticias
 *
 * @author isai rivas
 */
class Model_Noticias extends Lib_Mvc_Model {
    public function __construct() {
        parent::__construct('noticias', 'id');
        
    }
    
    public function uploadImagen(){
        $serverImage = new Lib_Util_ServerImage();
        $nombreImagen = '';
        try{
            $nombreImagen = $serverImage->upload('registro','imagen',PATH_UPLOADS_FILES_NOTICIAS);

           }catch(Exception $e){
               if($e->getCode() == 2 ){
                   return '';
               }
           }
           return $nombreImagen;
    }
    
    public function eliminaAntiguaImagen($fileName, $id) {
        $antiguoRegistro = $this->toArray($this->getByPrimary($id));
        $imagen = $antiguoRegistro[0]['imagen'];
        if (!empty($fileName)) {
            $antiguoRegistro = $this->toArray($this->getByPrimary($id));
            @unlink( PATH_UPLOADS_FILES_NOTICIAS . $antiguoRegistro[0]['imagen']);
            $imagen = $fileName;
        }
        return $imagen;
    }

    public function getNews($pag) {
        //Número de noticias mostradas por página.
        $n = 4;
        $i = ($pag * $n) - $n;
        $db = parent::getDB();
        $sql =  'SELECT * FROM '.$this->_name.' ORDER BY fecha DESC LIMIT '.$i.','.$n ;
        $db = parent::getDB();
        $result = parent::toArray($db->query($sql));
        return parent::toArray($result);
    }

    public function getArticulo($id) {
        $sql =  'SELECT * FROM noticias WHERE id = :id';
        $arr = array('id' => $id);
        $db = parent::getDB();
        $result = $db->queryPrepared($sql, $arr);
        return parent::toArray($result);
    }
}


