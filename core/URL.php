<?php
abstract class URL {
	
	
	/**
	 * Retorna dominio de acordo com parametro passado
	 * Se param = full, retorna o dominio completo 
	 */
	public static function getDomain($param=null){
				
		$url = explode('.', $_SERVER['HTTP_HOST']);
		if(isset($url[0]) && $url[0] == 'localhost'){
			$result = $url[0];
		}
		else{
			$result = ($param != null && $param != 'full') ? $url[$param] : $url;
			if($result == null){$result = $url[0];}
			
			if($param == 'full'){
				$result = '';	
				$len = sizeof($url);
				for($i=1; $i < $len; $i++){
					$result .= $url[$i];
					if($i < ($len-1)){ $result .= '.'; }
				}
			}
		}
			
		return $result; 	
	}
	
	
	/**
	 * Redireciona para pagina inicial
	 */
	public static function redirectToMain(){
		header('Location: '.Config::getDefine('public_url'));
		exit;
	}
	
	
	/**
	 * Remove todos acentos e cria uma url amigavel
	 */
	public static function getFriendUrl($text){
		$array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
			, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", "-", " ", "?", "!" );
		$array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
			, "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "_", "_", "", "" );
		
		$result = str_replace($array1, $array2, $text);
		
		return $result;
	}
	
	
}
?>