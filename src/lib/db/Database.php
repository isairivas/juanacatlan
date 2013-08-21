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
* Clase para conectarse a la base de datos
* se utiliza PDO como DAO 
*/
class Lib_Db_Database {
	
	private static $instance = null;
	private $pdoConnection = null;
	private $statusConnection = false;
	
	public function __construct(){
	    $this->connect();
	}
	
	public function testConnection(){
		return $this->statusConnection;
	}
	
	public function query($strQuery){
		$pdoConexion = $this->getConnect();
		$objResultSet = $pdoConexion->query($strQuery);
		if($objResultSet){
			return $objResultSet;
		} else {
			$arrInfoError = $pdoConexion->errorInfo();
			$strError = "Error en consulta [ {$strQuery} ] Informacion del error: [{$arrInfoError[2]}] ";
			throw new Exception($strError);
		}
	}
	
	public function queryPrepared($strQueryPrepared,$arrValues){
		$pdoConexion = $this->getConnect();
		$objPrepare = $pdoConexion->prepare($strQueryPrepared);
		foreach( $arrValues as $key => $value ){
			$objPrepare->bindValue(':'.$key, $value);
		}
		$objPrepare->execute();
		return $objPrepare->fetchAll();
	}
	
	public function exec($strQuery){
		$pdoConexion = $this->getConnect();
		if ( ! $pdoConexion ){
			return false;
		}
		$objResult = $pdoConexion->exec($strQuery);
		if ( $objResult ){
			return $objResult;
		} else {
			$arrInfoError = $pdoConexion->errorInfo();
			throw new Exception("Error a el realizar la consulta [{$strQuery}] detalle del error [{$arrInfoError[2]}] ");
		}
	}
	
	
	public function __clone(){
		throw new Exception("No se tiene permitido clonar esta clase");
	}
	
	private function connect()
	{
		$arrDB = array(
			'sgdb' => 'mysql',
			'server' => DB_SERVER,
			'name' => DB_NAME,
			'user' => DB_USER,
			'password' => DB_PASSWORD
		    );
		
		try{
			$this->pdoConnection = new PDO("{$arrDB['sgdb']}:host={$arrDB['server']};dbname={$arrDB['name']};", $arrDB['user'], $arrDB['password']);
			$this->statusConnection = true;
		} catch(PDOException $pdoe){
			throw new Exception('No se pudo conectar la base de datos :' .$pdoe->getMessage() );
			$this->statusConnection = false;
		}
		
	}
	
	public function getConnect()
	{
		if ( $this->statusConnection ){
			return $this->pdoConnection;
		} else {
			throw new Exception('No se ha establecido una conexion exitosa a la base de datos');
		}
	}
	
	public static function getInstance()
	{
		
		if(  is_null(self::$instance) ){
			$strClassName = __CLASS__;
			self::$instance = new $strClassName;
		}
		return self::$instance;
		
	}
	
	public function lastInsert(){
		return $this->pdoConnection->lastInsertId();
		// lastInsertId();
	}
}