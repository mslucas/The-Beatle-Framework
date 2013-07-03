<?php
class AuthController extends Controller {
	
	public $auth;
	
	function __construct() {
		//$this->auth = 'xxx;
	}
	
	function __destruct() {
    	//print '<br>Destruindo '.$this->auth;
    }
	
	public function main(){
		echo 'Não foi setado uma action nessa p$%¨&* de URL, então redireciona para action "main" existente em todos controllers.';
	}
	
	public function login($param) {
		//echo 'fazendo login do '.$param.'!';
		echo '<pre>';
		var_dump($_POST);
	}
	
	public function logout() {
		echo 'fazendo logout do '.$param.'!';
	}
	
	public function recovery($param){
		
		if($param == 'password'){
			echo 'recupera senha';
		}
		else{
			$error = new Errors();
			$error->code = '1002';
			$error->showError();	
		}
	}
	
	
	
	
}
?>