<?php
class LanguageController extends Controller {
	
	
	function __construct(){
	}
	
	function __destruct(){
    }
		
	public function main(){
		URL::redirectToMain();
	}
		
	/**
	 * Seta o idioma definido
	 */
	public function set($param){
		if(isset($param) && !empty($param)){
			I18n::setLanguage($param);
			URL::redirectToMain();
		}
	}
}
?>