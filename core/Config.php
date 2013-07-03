<?php
abstract class Config {
	
	private static $config;
	private static $lang_defines;

		
	/**
	 * Carrega objeto com definicoes de config
	 */	
	public static function loadConfig(){

		//if(session_status() != 2){session_start();} # PHP >= 5.4 
		if(!isset($_SESSION)){session_start();}

		$dir = dirname(dirname($_SERVER["SCRIPT_FILENAME"]));

		$config_defs = include($dir.'/config.php');
		$define_select = $config_defs[URL::getDomain('full')];

		if(!isset($define_select) || empty($define_select)){
			die('Error: Define file not exists!!!');
		}
		
		$arr = include($dir.'/'.$define_select.'.php');
		self::$config = $arr;
		
		$usr_def_lang = Cookies::getCookie('page_lang');
		
		#se nao tem o cookie de idioma, seta o idioma padrao
		if(!isset($usr_def_lang) && empty($usr_def_lang)){
			I18n::setLanguage(self::getDefine('page_lang'));
		}
		
		$lang_def = I18n::getLanguage();
		$lang_dir = dirname(dirname($dir)).'/i18n/'.I18n::getLanguage(); 
		
		$arr_labels = include($lang_dir.'/labels.php');
		$arr_messages = include($lang_dir.'/messages.php');
		
		self::$lang_defines = array();
		self::$lang_defines = array_merge($arr_labels, $arr_messages);
	}	
	
	
	/**
	 * Consulta parametro definido na config
	 * Apenas nivel PAI na array de defines
	 */
	public static function getDefine($param){
		$def_array = self::$config;
		$param = strtolower($param);
		//return (array_key_exists($param, $def_array) == TRUE ? utf8_decode($def_array[$param]) : NULL);
		return (array_key_exists($param, $def_array) == TRUE ? $def_array[$param] : NULL);	
	}
	
	/**
	 * Consulta parametro definido na config
	 * Apenas nivel PAI na array de defines
	 */
	public static function echoDefine($param){
		$def_array = self::$config;
		$param = strtolower($param);
		echo (array_key_exists($param, $def_array) == TRUE ? $def_array[$param] : NULL);
	}
	
	
	/**
	 * Retorna se esta rodando local ou externo
	 */
	public static function isLocal(){
		$result = false;	
		if($_SERVER['SERVER_ADDR'] == '127.0.0.1'){
			$result = true;
		}
		return $result;
	}
	
	
	/**
	 * Retorna o nome da aplicacao rodando em questao
	 * 
	 */
	public static function getAppName(){
		return self::getDefine('app_id');
	}
	
	
	
	/**
	 * Retorna um array com todos defines de idioma
	 */
	public static function getLangDefines(){
		return self::$lang_defines;
	}
	
	
	
}
?>