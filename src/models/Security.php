<?php
class Model_Security extends Lib_Mvc_Model {
	public function __construct(){
		parent::__construct('usuarios', 'id');
	}
	
	public function getPermisos(){
		$table = new Lib_Db_AbstractTable('permisos', 'id');
		$results = array();
		try{
			$results = $table->select();
		}catch(Exception $e){}
		$permisos = array();
		foreach($results as $permiso){
			$permisos[] = $permiso;
		}
		return $permisos;
	}
	
	public function getPermiso($nombre){
		
		$where = " WHERE nombre = '{$nombre}'  ";
		
		$table = new Lib_Db_AbstractTable('permisos', 'id');
		$results = array();
		try{
			$results = $table->select($where);
		}catch(Exception $e){}
		$permisos = array();
		foreach($results as $permiso){
			$permisos[] = $permiso;
		}
		return $permisos[0];
	}
	
	public function getPermisosByRol(){
		
	}
	
	public function hasPermisoTheRol($rol_id,$permiso_id){
		$table = new Lib_Db_AbstractTable('roles_has_permisos', 'id');
		$where = " WHERE roles_id = {$rol_id} AND permisos_id = {$permiso_id}  ";
		$results = array();
		$results = $table->select($where);
		$permisos = array();
		foreach($results as $permiso){
			$permisos[] = $permiso;
		}
		if(count($permisos) > 0 ){
			return true;
		} else {
			return false;
		}
		
	}
}

