<?php
class MaintenanceController extends Controller {
	
	
	function __construct() {
	}
	
	function __destruct() {
    }
		
	public function main() {
		$this->index();
	}
		
	public function index() {
		
		$param['title'] = 'Sistema em Manutenção';
		$param['css'][] = 'main';
		$param['skin'] = 'Sso';
		
		$this->view('maintenance', $param);
	}
}
?>