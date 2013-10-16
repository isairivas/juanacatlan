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

    public function getMonth($month) {
    	
    	$sql = 'SELECT * FROM eventos WHERE mes = '. $month;
    	$db = parent::getDB();
        $result = $db->query($sql);
        return parent::toArray($result);
    }
}