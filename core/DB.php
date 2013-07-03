<?php
class DB {
		
	private $db_server; #selected DB properties
	private $conn;      #connected DB instance
	
			
	
	function __construct($db_name=null){
		$db_arr = Config::getDefine('db');
		$this->db_server = ($db_name == null ? $db_arr[Config::getDefine('default_db_server')] : $db_arr[$db_name]);
		$this->conn = $this->connectDB();
	}
	
	
	/**
	 * Conecta no DB
	 */
	private function connectDB(){
		
		$db_type = $this->db_server['type']; 	
		$db_host = $this->db_server['host'];
		$db_port = $this->db_server['port'];
		$db_database   = $this->db_server['database'];
		$db_username   = $this->db_server['username'];
		$db_password   = $this->db_server['password'];
		$db_persistent = $this->db_server['persistent'];
				
		switch($db_type){
				
			case 'oracle':
				$db_conn_str  = '//'.$db_host.':'.$db_port.'/'.$db_database;
				$db_conn_type = ($db_persistent == true ? 'oci_pconnect' : 'oci_connect');	
				
				if(!$this->conn = $db_conn_type($db_username, $db_password, $db_conn_str)){
					$e = oci_error();
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}		
				break;
			
			case 'mysql':
				if(!$this->conn = ($db_persistent == FALSE ? mysql_connect($db_host, $db_username, $db_password) : mysql_pconnect($db_host, $db_username, $db_password))){
					die(mysql_error());
				}
				else{
					mysql_select_db($db_database, $this->conn);
				}
				break;
		}
		
		return $this->conn;
	}	
	
	public function getConn(){
		return $this->conn;
	}
	
	/**
	 * Executa query na forma tradicional
	 */
	public function dbQuery($sql, $bind_sql=array()){
		
		if($this->db_server['type'] == 'mysql'){
			$stid = mysql_query($sql, $this->conn);	
		}
		else {
			$stid = oci_parse($this->conn, $sql);
			
			if(!(empty($bind_sql))){
	            foreach($bind_sql AS $key => $value){
	                oci_bind_by_name($stid, $key, $bind_sql[$key], -1);
	            }
	        }
			
			oci_execute($stid);
		}
		
		return $stid;
	}
	
	
	/**
	 * Retorna array de registros
	 */
	public function dbFetchArray($res){
		if($this->db_server['type'] == 'mysql'){
			$data = array();
			
			while($reg = mysql_fetch_array($res, MYSQL_ASSOC)) {
				$data[] = $reg;	
			}
			
			return $data;	
		}
		else{
			return oci_fetch_array ($res, OCI_ASSOC+OCI_RETURN_NULLS);
		}
	}
	
	
	/**
	 * Total registros retornados
	 */
	public function dbNumRows($res){
		if($this->db_server['type'] == 'mysql'){
			return mysql_num_rows($res);
		}	
		else{
			return oci_num_rows($res);
		}
	}
	
	
	/**
	 * Total colunas retornadas
	 */
	public function dbNumCols($res){
		return oci_num_fields($res);
	}
	
	
	/**
	 * Retorna informa��es sobre determinada coluna
	 */
	public function dbFieldInfo($res, $i){
		$field['name'] = oci_field_name($res, $i);	
		$field['type'] = oci_field_type($res, $i);	
		$field['size'] = oci_field_size($res, $i);
		return $field;
	}
	
	
	/**
	 * Retorna o tipo de execucao do comando executado
	 */
	public function dbSqlType($res){
		return oci_statement_type($res);
	}
	
	
	/**
	 * Retorna objeto da consulta
	 */
	public function dbFetchObject($res){
		return oci_fetch_object($res);
	}
	
	
	/**
	 * Retorna vers�o do servidor Oracle
	 */
	public function dbServerVersion(){
		return oci_server_version($this->conn);
	}
	
	
	/**
	 * Retorna vers�o do cliente Oracle
	 */
	public function dbClientVersion(){
		return oci_client_version();
	}
	
	
	public function select(){
		
	}
	
	
	public function insert(){
		
	}
	
	
	public function update(){
		
	}
	
	
	public function delete(){
		
	}
	
	
	
	public function getDB(){
		return $this->db_server;
	}
	
	
	
}
?>