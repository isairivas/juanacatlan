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

class Lib_Mvc_Model extends Lib_Db_AbstractTable {
	
	public function __construct($nameTable,$primary) {
		parent::__construct($nameTable, $primary);
	}
	
	public function get(){
		return $this->select();
	}
	
	public function toArray($pdoResult){
		$data = array();
		foreach($pdoResult as $result ){
			$data[] = $result;
		}
		
		return $data;
	}
        
        public function getByPrimary($id){
            if(!filter_var($id,FILTER_VALIDATE_INT)){
                throw new Exception('El valor debe ser entero');
            }
            return parent::select(' WHERE '.$this->_primary .' = '.$id );
        }
        public function deleteByPrimary($id){
            if(!filter_var($id,FILTER_VALIDATE_INT)){
                throw new Exception('El valor debe ser entero');
            }
            
            parent::delete( $this->_primary .' = '.$id );
        }
}

