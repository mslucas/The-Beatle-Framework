<?php
class I18n {
	
	
	/**
	 * Set cookie and reload site
	 */
	public static function setLanguage($lang){
		$dir = dirname(dirname($_SERVER["SCRIPT_FILENAME"]));
		
		if(file_exists(dirname(dirname($dir)).'/i18n/'.$lang)){
			if(isset($lang) && !empty($lang)){
				Cookies::setCookie('page_lang', $lang, 60);
			}
		}
		else{
			die('Linguagem setada nao existe!');
		}
	}
	
	
	/**
	 * Return the actual application language 
	 */
	public static function getLanguage(){
		$cook_lang_def = Cookies::getCookie('page_lang');
		
		if(isset($cook_lang_def) && !empty($cook_lang_def)){
			return $cook_lang_def;
		}
		else{
			$pglang = Config::getDefine('page_lang');
			self::setLanguage($pglang); 	
			return $pglang;
		}
	}
	
	
	/**
	 * Consulta define de linguagem
	 */
	public static function getText($key, $utf8=true){
		$def = Config::getLangDefines();
		return ($utf8) ? utf8_decode(strtolower($def[$key])) : strtolower($def[$key]);
	}
	
	
	/**
	 * Exibe define de linguagem
	 */
	public static function echoText($key, $utf8=true){
		$def = Config::getLangDefines();
		echo ($utf8) ? utf8_decode(strtolower($def[$key])) : strtolower($def[$key]);
	}
	
	
}
?>