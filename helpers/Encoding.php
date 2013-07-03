<?php
class Encoding {

	#automatic conversion if need
	public static function utf8_encode($string){
		return (strtolower(ini_get('default_charset')) != 'utf-8') ? utf8_encode($string) : $string;
	}

	#automatic conversion if need
	public static function utf8_decode($string){
		return (strtolower(ini_get('default_charset')) != 'utf-8') ? utf8_decode($string) : $string;
	}

}
?>