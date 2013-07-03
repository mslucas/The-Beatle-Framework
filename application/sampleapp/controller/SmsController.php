<?php
class SmsController extends Controller {
	
	function __construct() {
	}
	
	function __destruct() {
    }
	
	public function main() {
		$this->index();	
	}
	
	public function index() {
		
		if(isset($_POST['txtFone']) && $_POST['txtFone'] != ''){
			$gv = new GoogleVoice();
			
			if($gv->sendSMS($_POST['txtFone'], $_POST['txtMessage'])){
				$param['msg'] = 'SMS enviado com sucesso!';
			}
			else{
				$param['msg'] = 'SMS nao enviado...';
			}
		}
		
		$param['title'] = 'SMS Sender';
		$param['css'][] = 'style';
		$param['css'][] = 'form_default';
		$param['js'][]  = 'jquery.validate.min';
		$param['addclass'][] = 'bt_sms, topbar_bt_active'; #selector, class
		$param['skin'] = 'Modelo'; 
		 
		$this->view('FormSms', $param);
	}
	
	
}
?>