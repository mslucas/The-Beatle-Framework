<?php
class DeployController extends Controller {
	
	function __construct(){
	}
	
	function __destruct(){
    }
	
	public function main(){
		$this->index();
	}
	
	public function index(){
		$param['title'] = 'SVN Deploy Control';
		$param['css'][] = 'style';
		$param['css'][] = 'form_default';
		$param['css'][] = 'style_daemon';
		$param['js'][]  = 'jquery.validate.min';
		$param['skin']  = 'Modelo';
		
		$param['addclass'][] = 'bt_deploy, topbar_bt_active'; #selector, class
				
		$this->view('Deploy', $param);
	}
	
	
}
?>