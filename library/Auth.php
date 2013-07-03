<?php
class Auth {
	
	/**
	 * Consulta usuario e senha no DB
	 */
	public static function doLogin($cpf, $passwd){
		
		$db = new DB();
		
		$bind_sql[':p_cpf'] = $cpf;
		
		//self::doLogout();
				
		$sql = '
			SELECT espe_codi
			     , espe_senh
			     , espe_nome
			     , espe_tipo
			     , espe_pess
			     , espe_cpf
			     , espe_mail
			     , espe_compara_string
			  FROM V_ESPECIALIZACAO_AUTH
			 WHERE espe_cpf = :p_cpf';
		
		$res = $db->dbQuery($sql, $bind_sql);
		$auth_obj = (object) Array();
		$user_ok = FALSE;
		$result = NULL;

		while($reg = $db->dbFetchArray($res)){
			if(sizeof($reg) >= 1){
				$user_ok = TRUE;
			}
			if(isset($passwd) && !empty($passwd) && strtoupper(md5($passwd)) == $reg['ESPE_SENH']){
				$auth_obj->espe_cpf  = $reg['ESPE_CPF'];
				$auth_obj->espe_pess = $reg['ESPE_PESS'];
				$auth_obj->espe_nome = $reg['ESPE_NOME'];
				$auth_obj->espe_mail = $reg['ESPE_MAIL'];
				$auth_obj->credenciais[$reg['ESPE_TIPO']] = array('espe_codi' => $reg['ESPE_CODI'], 'espe_senh' => $reg['ESPE_SENH']);	
			}
		}

		$result = ($user_ok) ? $auth_obj : false;

		
		/*
		if($db->dbNumRows($res) == 1){
			$result = FALSE;	
			
			if($passwd == $reg[0]['usuario_senha']){
				Session::setSession('usuario_codigo', $reg[0]['usuario_codigo']);
				Session::setSession('usuario_nome', $reg[0]['usuario_nome']);
				Session::setSession('usuario_pnome', $reg[0]['usuario_pnome']);
				Session::setSession('usuario_email', $reg[0]['usuario_email']);
				Session::setSession('usuario_status', $reg[0]['usuario_status']);
				Session::setSession('usuario_grupo', $reg[0]['usuario_grupo']);
				Session::setSession('usuario_last_login', $reg[0]['usuario_last_login']);
				
				foreach($_SESSION as $key => $value){
					$result[$key] = Session::getSession($key);	
				}
				
				$sql = '
					UPDATE usuarios
					   SET usuario_last_login = sysdate()
					 WHERE usuario_codigo = '.$reg[0]['usuario_codigo'];
					 
				$db->dbQuery($sql);
			}	
		}*/
		
	    return $result;
	}



	/**
	 * Destroy a sessao logada no sistema
	 */
	public static function doLogout(){
		//Session::unsetSessions();
		Session::unregisterSession('usuario_codigo');
		Session::unregisterSession('usuario_nome');
		Session::unregisterSession('usuario_pnome');
		Session::unregisterSession('usuario_email');
		Session::unregisterSession('usuario_status');
		Session::unregisterSession('usuario_grupo');
		
		return TRUE;	
	}
	
	
	/**
	 * Verifica se esta autenticado
	 */ 
	public static function isAuth(){
		if(Session::getSession('usuario_codigo') != NULL){
			return TRUE;	
		}
		else {
			return FALSE;
		}		
	}
	
	
	
	/**
	 * Retorna o grupo de permissao do usuario autenticado
	 */
	public static function getPerm(){
		if(self::isAuth()){
			return Session::getSession('usuario_grupo');
		}
		else {
			return FALSE;
		}
	}
	
	
	/**
	 * Retorna autenticação completa do usuario
	 */
	public static function getAuth($param=null){
		if($param != NULL && !empty($_SESSION[$param])){
			return Session::getSession($param);
		}
		elseif(!empty($_SESSION['usuario_codigo'])){
			$auth['usuario_codigo'] = Session::getSession('usuario_codigo');
			$auth['usuario_nome']   = Session::getSession('usuario_nome');
			$auth['usuario_pnome']  = Session::getSession('usuario_pnome');
			$auth['usuario_email']  = Session::getSession('usuario_email');
			$auth['usuario_status'] = Session::getSession('usuario_status');
			$auth['usuario_grupo']  = Session::getSession('usuario_grupo');
			$auth['usuario_last_login'] = Session::getSession('usuario_last_login');
			return $auth;
		}
		else {
			return FALSE;
		}
	}
	
	
	/**
	 * Requer autenticacao
	 */
	public static function needAuth(){
		if(!self::isAuth()){
			URL::redirectToMain();
			//header('Location: '.Session::getSession('main_http_url'));
			//exit;
		}
	}
	

}
?>