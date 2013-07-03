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
		
		$param['title'] = 'Sample Application';
		$param['css'][] = 'style';
		$param['css'][] = 'form_default';
		$param['js'][]  = 'jquery.validate.min';
		$param['addclass'][] = 'bt_home, topbar_bt_active'; #selector, class 
		$param['skin'] = 'Modelo';
		
		$this->view('Index', $param);
	}
		
}
?>