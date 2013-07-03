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
		$param['title'] = 'System under Maintenance';
		$param['skin'] = 'Modelo';
		
		$this->view('Maintenance', $param);
	}
	
}
?>