<?php
abstract class Session {

	/**
	 * Seta sess�o com chave e valor
	 */
	public static function setSession($key, $value){
		$_SESSION[$key] = base64_encode($value);
	}
	
	
	/**
	 * retorna valor da session
	 */
	public static function getSession($key){
		return (isset($_SESSION[$key]) ? base64_decode($_SESSION[$key]) : NULL);
	}
	
	
	/**
	 * Destroi todas sessoes ativas
	 */
	public static function unsetSessions(){
		session_unset();
	}
	
	
	
	/**
	 * Apaga um registro da session em especifico
	 * passando a key como parametro
	 */
	public static function unregisterSession($key){
		unset($_SESSION[$key]);
	}
	
	
	
	/**
	 * Retorna o STATUS das sessoes
	 * 0 = SESSOES DESABILITADAS
	 * 1 = SESSOES HABILITADAS, POREM NENHUM REGISTRO
	 * 2 = SESSOES HABILITADAS, EXISTE PELO MENOS UM REGISTRO
	 * 
	 * Obs: Funciona APENAS no PHP > 5.4.X
	 */
	public static function statusSession(){
		$result = 0;	
		switch(session_status()){
			case 'PHP_SESSION_DISABLED':
				$result = 0;
				break;	
			case 'PHP_SESSION_NONE':
				$result = 1;
				break;
			case 'PHP_SESSION_ACTIVE':
				$result = 2;
				break;
			default:
				$result = 0;	
				break;
		}
		
		return $result;	
	}
	
	
	
}
?>