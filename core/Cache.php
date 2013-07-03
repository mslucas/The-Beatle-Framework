<?php
class Cache {
	
	#instancia memcached
	private $memcached;
	
	/**
	 * Carrega servidores Memcached
	 */
	function __construct(){
		$mcache_arr = Config::getDefine('memcached');
		$this->memcached = new Memcache();
		//$servers = array();
		foreach($mcache_arr as $key => $value){
			//$servers[] = array($value['host'], $value['port']);
			$this->memcached->addServer($value['host'], $value['port']);
		}
		//$this->memcached->addServers($servers);
	}
	
	/**
	 * Destroi conexao no memcached
	 */
	function __destruct(){
		$this->memcached->close();
	}
	
	
	/**
	 * Insere objetos no memcached, passando chave, valor e tempo de expiração em segundos
	 */
	public function add($key, $value, $expire){
		if($key != NULL && $value != NULL){
			$m = &$this->memcached; 
			$m->add($key, $value, false, $expire);
		}
	}
	
	
	/**
	 * Retorna objetos armazenados no memcached través da chave
	 */
	public function get($key){
		$result = null;	
		if($key != null){
			$m = &$this->memcached;
			$result = $m->get($key);
		}
		return $result;
	}
	
	
	/**
	 * Deleta do cache algum objeto em específico
	 */
	public function delete($key){
		if($key != NULL){
			$m = &$this->memcached;
			$m->delete($key);
		}
	}
	
	
	/**
	 * Limpa todos objetos do cache
	 */
	public function flushObjects(){
		$m = &$this->memcached;
		$m->flush();
	}
	
	
	/**
	 * Atualiza registro do cache
	 */
	public function replace($key, $value, $expire=null){
		if($key != NULL && $value != NULL){
			$m = &$this->memcached; 
			$m->replace($key, $value, false, $expire);
		}
	}
	
	/**
	 * Verifica se existe algum determinado objeto 
	 * em cache.
	 * @return boolean
	 */
	public function ifExist($key){
		$result = FALSE;	
		if($key != NULL){
			$m = &$this->memcached;
			$res = $m->get($key); 
			if($res != false && $res != NULL){
				$result = TRUE;
			}
		}
		return $result;
	}
	
	
	
	
	public function serverStatus(){
		$result = '';	
		$m = &$this->memcached;
		return $this->printDetails($m->getStats()); 
	}
	
	
	private function printDetails($status){ 
		$content  = "<table border='0'>"; 
		$content .= "<tr><td>Memcache Server version:</td><td> ".$status ["version"]."</td></tr>"; 
        $content .= "<tr><td>Process id of this server process </td><td>".$status ["pid"]."</td></tr>"; 
        $content .= "<tr><td>Number of seconds this server has been running </td><td>".$status ["uptime"]."</td></tr>"; 
        //$content .= "<tr><td>Accumulated user time for this process </td><td>".$status ["rusage_user"]." seconds</td></tr>"; 
        //$content .= "<tr><td>Accumulated system time for this process </td><td>".$status ["rusage_system"]." seconds</td></tr>"; 
        $content .= "<tr><td>Total number of items stored by this server ever since it started </td><td>".$status ["total_items"]."</td></tr>"; 
        $content .= "<tr><td>Number of open connections </td><td>".$status ["curr_connections"]."</td></tr>"; 
        $content .= "<tr><td>Total number of connections opened since the server started running </td><td>".$status ["total_connections"]."</td></tr>"; 
        $content .= "<tr><td>Number of connection structures allocated by the server </td><td>".$status ["connection_structures"]."</td></tr>"; 
        $content .= "<tr><td>Cumulative number of retrieval requests </td><td>".$status ["cmd_get"]."</td></tr>"; 
        $content .= "<tr><td> Cumulative number of storage requests </td><td>".$status ["cmd_set"]."</td></tr>"; 

        $percCacheHit=((real)$status ["get_hits"]/ (real)$status ["cmd_get"] *100); 
        $percCacheHit=round($percCacheHit,3); 
        $percCacheMiss=100-$percCacheHit; 

        $content .= "<tr><td>Number of keys that have been requested and found present </td><td>".$status ["get_hits"]." ($percCacheHit%)</td></tr>"; 
        $content .= "<tr><td>Number of items that have been requested and not found </td><td>".$status ["get_misses"]."($percCacheMiss%)</td></tr>"; 

        $MBRead= (real)$status["bytes_read"]/(1024*1024); 

        $content .= "<tr><td>Total number of bytes read by this server from network </td><td>".$MBRead." Mega Bytes</td></tr>"; 
        $MBWrite=(real) $status["bytes_written"]/(1024*1024) ; 
        $content .= "<tr><td>Total number of bytes sent by this server to network </td><td>".$MBWrite." Mega Bytes</td></tr>"; 
        $MBSize=(real) $status["limit_maxbytes"]/(1024*1024) ; 
        $content .= "<tr><td>Number of bytes this server is allowed to use for storage.</td><td>".$MBSize." Mega Bytes</td></tr>"; 
        $content .= "<tr><td>Number of valid items removed from cache to free memory for new items.</td><td>".$status ["evictions"]."</td></tr>"; 
		$content .= "</table>";
		
		return $content; 
	}
	
	
	
	
}
?>