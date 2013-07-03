<?php
class IndexController extends Controller {
	
	function __construct(){
	}
	
	function __destruct(){
    }
	
	
	public function main(){
		$this->index();
	}
	
	
	public function index(){
		
		$param['title'] = ucfirst(I18n::getText('sso', false));
		$param['css'][] = 'main';
		$param['js'][]  = 'jquery.validate';
		$param['js'][]  = 'jquery.maskedinput-1.1.4.pack';
		$param['skin']  = 'Sso';
		$param['error'] = null;
				
		if(isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['passwd']) && !empty($_POST['passwd'])){
			if(!is_numeric($_POST['cpf'])){
				$_POST['cpf'] = StringHelper::furlConvert($_POST['cpf']);
			}

			if(is_numeric($_POST['cpf'])){
				$result = Auth::doLogin($_POST['cpf'], $_POST['passwd']);
				if(isset($result)){
					if($result == false){
				        $param['error'] = 1000;
				    }
				    elseif(!isset($result->credenciais)){
				        $param['error'] = 1001;
				    }
				    else{
				    	$param['dados'] = $result;
						$this->view('AppPanel', $param);
						exit;			            
				    }
				}
			}
			else{
				$param['error'] = 1002;
			}
		}
				
		$this->view('LoginMainForm', $param);
	}

}
?>