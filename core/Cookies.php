<?php
abstract class Cookies {


	/**
	 * Seta um cookie com base na chave
	 */
	public static function setCookie($key, $value, $tot_days=15){
		$day_secs = 86400;
		$days = ($day_secs * $tot_days);
		self::clearCookie($key);
		setcookie($key, $value, time()+$days, '/');
	}
	
	
	/**
	 * retorna valor do cookie
	 */
	public static function getCookie($key){
		return (isset($_COOKIE[$key]) ? $_COOKIE[$key] : NULL);
	}	
	
	
	/**
	 * Limpa o cookie com base na key
	 */
	public static function clearCookie($key){ 
	    setcookie($key, '', time()-3600); 
	    unset($_COOKIE[$key]); 
	} 
	
	
	/**
	 * Limpa todos cookies setados neste dom�nio
	 */
	public static function destroyCookies(){
		$past = (time()-3600);
		foreach($_COOKIE as $key => $value){
		    setcookie($key, $value, $past);
		}
	}
	
	
	
}
?>