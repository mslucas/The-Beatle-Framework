<?php
class GeolocationController extends Controller {
	
	function __construct(){
	}
	
	function __destruct(){
    }
	
	public function main(){
		$this->index();
	}
	
	public function index(){
		$param['title'] = 'Geolocation';
		$param['css'][] = 'style';
		//$param['css'][] = 'form_default';
		//$param['js'][]  = 'jquery/jquery.validate.min';
		$param['addclass'][] = 'bt_geolocation, topbar_bt_active'; #selector, class 
		$param['skin'] = 'Modelo';
		
		$this->view('Geolocation', $param);
	}
	
	
}
?>