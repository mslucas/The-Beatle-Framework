<?php
class Geolocation {
	
	private $_service_url = 'http://www.geoplugin.net/php.gp?ip=';
	
	private $_ip;
	private $_latitude;
	private $_longitude;
	private $_city;
	private $_country;
	private $_countrycode;
	private $_region;
	
	
	function __construct(){
		
		$proxy = array(
	    'http' => array(
	        'proxy' => 'tcp://nutec.uniasselvi.com.br:666',
	        'request_fulluri' => True,
	        ),
	    );
	
		$confProxy = stream_context_create($proxy);
		
		//$this->_ip = $_SERVER['REMOTE_ADDR'];
		$this->_ip = '189.73.127.81';
		$data =  unserialize(file_get_contents($this->_service_url.$this->_ip, false, $confProxy));
		
		
		
		Show::varDump($data);
	}
	
		
	
	
}
?>