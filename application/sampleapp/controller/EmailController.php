<?php
class EmailController extends Controller {
	
	function __construct(){
	}
	
	function __destruct(){
    }
	
	public function main(){
		$this->index();	
	}
	
	public function index(){
		
		if(isset($_POST['txtName']) && $_POST['txtName'] != ''){
			$email = new Email();
			$param['msg'] = $email->sendMail($_POST['txtMail'], $_POST['txtSubject'], $_POST['txtContent']);
		}
				
		$param['title'] = 'Mail Sender';
		$param['css'][] = 'style';
		$param['css'][] = 'form_default';
		$param['js'][]  = 'jquery.validate.min';
		$param['addclass'][] = 'bt_email, topbar_bt_active'; #selector, class
		$param['skin'] = 'Modelo'; 
		 
		$this->view('FormEmail', $param);
	}
	
	
}
?>