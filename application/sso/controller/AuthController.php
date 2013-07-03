<?php
class AuthController extends Controller {

	function __construct(){
	}
	
	function __destruct(){
    }
	
	
	public function main(){
		URL::redirectToMain();
	}


	public function login($args=null){
		$param['webservice'] = true;
		$param['data'] = 'oi boi';
		$this->view('AuthService', $param);
	}


}
?>