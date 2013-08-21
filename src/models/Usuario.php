<?php

class Model_Usuario extends Lib_Mvc_Model {
	public function __construct(){
		parent::__construct('usuarios', 'id');
		
	}
	
	public function set(){
		$set = 'hola';
		parent::insert($set);
	}
	
	public function autenticate($user,$password){
	    $results = $this->select();
	    $usuarios = array();
	    $users = array();
		foreach($results as $item){
			$usuarios[$item['usuario']] =  $item;
			$users[] = $item['usuario'];
		}
		
		if( !in_array($user, $users)){
			throw new Exception('El usuario es No existe.');
		}
		
		
		if($usuarios[$user]['password'] == md5($password) ){
			$resultUser =  $this->getUsers($usuarios[$user]['id']);
			return $resultUser[0];
			
		} else {
			throw new Exception('El Password es incorrecto.');
		}
	}
	
	public function getUsers($id=null){
		$db = $this->getDB();
		$results = array();
		$usuarios = array();
		
		$query = " SELECT u.* "
				."  FROM usuarios u "
				."  ";
		if( !is_null($id) && is_numeric($id) ){
			$query .= " WHERE u.id = {$id} ";
		}
		
		try{
			$results = $db->query($query);
		} catch(Exception $e){
			throw new Exception('Error al obtener los usuarios '.$e->getMessage());
		}
		
		
		foreach($results as  $item ){
			$usuarios[] = $item;			
		}
		
		return $usuarios;
	}
	
	public function deleteUser($id){
		return $this->delete(' id =  '.$id);
	}
	
	public function getRoles($idUser){
		$db = $this->getDB();
		$roles = array();
	    $queryRoles = " SELECT ur.*, r.nombre AS nombre "
				. " FROM usuarios_has_roles ur  "
				. "     INNER JOIN roles r  ON ur.roles_id = r.id "
				."  WHERE ur.usuarios_id = {$idUser} ";
		try{
			$rolesResult = $db->query($queryRoles);
		foreach($rolesResult as $rolItem ){
			$roles[] = $rolItem;
		}
		
		}catch(Exception $e){}
				
	    return $roles;
	}
	
	public function deleteRol($idRelation){
		$table = new Lib_Db_AbstractTable('usuarios_has_roles', 'id');
		$table->delete(' id =  '.$idRelation);
	}
	
	public function addRol($userId,$roleId){
		$table = new Lib_Db_AbstractTable('usuarios_has_roles', 'id');
		$registro = array(
			'usuarios_id' => $userId,
			'roles_id'    => $roleId,
			'created_at'  => date('Y-m-d H:i:s'),
			'created_by'  => $_SESSION['user']['id']
		);
		try{
			$table->insert($registro);
		}catch(Exception $e){}
	}
	
}

