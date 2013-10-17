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
}