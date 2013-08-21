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
* Clase para realizar las operaciones correspondientes
* a las tablas de alguna base de datos, Es una abtracion tal cual
*/
class  Lib_Db_AbstractTable {
	
	protected $_primary = 0;
	protected $_name = null;
	
	private $db = null;
	
	public function __construct($nameTable,$primary){
		$this->db = Lib_Db_Database::getInstance();
		$this->_name = $nameTable;
		$this->_primary = $primary;
	}
	
	public function getTable(){
		
	}
	public function select($where = null, $strOrderBy = null, $strOrderMode = 'ASC' ){
		if(is_null($strOrderBy)){
			$strOrderBy = $this->_primary;
		}
		if ( $strOrderMode != 'ASC' && $strOrderMode != 'DESC' ) {
			throw new Exception('El ordenamiento para la tabla '.$this->_name.' es invalido');
			
		}
		
		$queryWhere = '';
		if (!is_null($where)){
			$queryWhere = $where;
		}
		
		$strQuery = " SELECT * FROM {$this->_name} {$queryWhere}  ORDER BY {$strOrderBy} {$strOrderMode} ";
		$objResult = $this->db->query($strQuery);
		if ( $objResult ) {
			return $objResult;
		} else {
			
			throw new Exception('Error a el obtener los registros en AbstractTable');
			return array();
		}
	}
	
	public function insert($registro){
		
		$query = " INSERT INTO {$this->_name} ( ";
		$countReg = 0;
		foreach ($registro as $key => $reg ){
			if ($countReg==0){
				$query.= " {$key} ";
			} else {
				$query.= " ,{$key} ";
			}
			$countReg++;
		}
		$query .= ' ) VALUES ( ';
		$countReg = 0;
		foreach ($registro as $key => $reg ){
			if ($countReg==0){
				$query.= " '{$reg}' ";
			} else {
				$query.= " ,'{$reg}' ";
			}
			$countReg++;
		}
		$query .= ' ); ';
		
		
		
		if ( $this->db->exec($query) ){
			
			return $this->db->lastInsert();
		} else {
			throw new Exception("Error al insertar en la tabla [{$this->_name}] ");
		}
	}
	public function update($set, $where = null){
		
		$query = " UPDATE {$this->_name} SET ";
		$countReg = 0;
		foreach ($set as $key => $dato ){
			if ($countReg==0){
				$query.= " {$key} = '{$dato}' ";
			} else {
				$query.= " , {$key} = '{$dato}' ";
			}
			$countReg++;
		}
		$query.= " {$where} ; ";
		if ( $this->db->exec($query) ){
			return true;
		} else {
			return false;
		}
	}
	public function delete($where){
		
		$strQuery = " DELETE FROM {$this->_name} WHERE {$where} ";
		if ( $this->db->exec($strQuery) ){
			return true;
		} else {
			return false;
		}
	}
	
	public function getDB(){
		return $this->db;
	}
}