<?php
/**
 * Modelo para eventos.
 *
 * @author isai rivas
 */
class Model_Eventos extends Lib_Mvc_Model {
	public function __construct() {
        parent::__construct('eventos', 'id');
        
    }

    public function getAll(){
        $sql = ' SELECT * FROM eventos ORDER BY fecha DESC ';
        $db = parent::getDB();
        $result = $db->query($sql);
        return parent::toArray($result);
    }

    public function getMonth($year, $month) {
    	$from = $year .'-'.$month.'-01';
        $to = $year .'-'.$month.'-31';
    	$sql = 'SELECT * FROM eventos WHERE fecha BETWEEN "'.$from.'" AND "'.$to.'" ORDER BY fecha';
    	$db = parent::getDB();
        $result = $db->query($sql);
        return parent::toArray($result);
    }

    public function getEvento($id){
        $sql =  'SELECT * FROM eventos WHERE id = :id';
        $arr = array('id' => $id);
        $db = parent::getDB();
        $result = $db->queryPrepared($sql, $arr);
        return parent::toArray($result);
    }
    public function uploadImagen(){
        $serverImage = new Lib_Util_ServerImage();
        $nombreImagen = '';
        try{
            $nombreImagen = $serverImage->upload('registro','imagen',PATH_UPLOADS_FILES_EVENTOS);

           }catch(Exception $e){
               if($e->getCode() == 2 ){
                   return false;
               }
           }
           return $nombreImagen;
    }
    public function eliminaAntiguaImagen($fileName, $id) {
        $antiguoRegistro = $this->toArray($this->getByPrimary($id));
        $imagen = $antiguoRegistro[0]['imagen'];
        if (!empty($fileName)) {
            $antiguoRegistro = $this->toArray($this->getByPrimary($id));
            @unlink( PATH_UPLOADS_FILES_EVENTOS . $antiguoRegistro[0]['imagen']);
            $imagen = $fileName;
        }
        return $imagen;
    }
}