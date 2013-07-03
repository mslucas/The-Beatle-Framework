<?php
class Errors {
	
	public $code;
	public $obj = array();
	
	
	
	
	function __construct() {
		//do something muttley!	
	}	
	
	
	/**
	 * Identify and show errors
	 */
	public function showError($error_type=null) {
		
		switch($this->code){
			case '1000':
				echo '<center>ERROR 1000!<br> Controller "'.$this->obj['controller'].'" not found!</center>';
				break;
				
			case '1001':
				echo '<center>ERROR 1001!<br> Action "'.$this->obj['action'].'" not found!</center>';
				break;
			
			case '1002':
				echo '<center>ERROR 1002!<br> Access Denied!</center>';
				break;
			
			case '1003':
				echo '<center>ERROR 1003!<br> Skin "'.$this->obj.'" not found!</center>';
				break;	
			
			case '1004':
				echo '<center>ERROR 1004!<br> CSS "'.$this->obj.'" not found!</center>';
				break;	
			
			default:
				echo '<center>Error doesn\'t identified!</center>';
				break;
		}
		
		#warning = T
		if($error_type == 'w'){
			echo '<center><strong>WARNING</strong></center>';	
		}
		else{
			die('<center><strong>CRITICAL ERROR</strong></center>');
		}
	}
	
	
	
	
}
?>