<?php
class Controller implements ControllerInterface {
	
	public $magic_methods;
	
	
	function __construct(){
		$this->magic_methods = false;
	}
	
	function __destruct(){
		
	}
	
	public function main(){
		
	}
	
	
	/**
	 * Load view
	 */
	protected function view($viewname, $params=null) {
			
		$layout = new Layout();	
		
		//$viewname = strtolower(trim($viewname));
		$viewname = trim($viewname);
		
		$layout->loadView($viewname, $params);
		
		exit();
	}	
	

	/**
	 * Call a virtual controller in DB
 	 */
	public static function getVirtualController($url_alias, $lang=null){

		if($lang == null){
			$lang = I18n::getLanguage();
		}

		$db = new DB();
		
		$sql = '
			SELECT vico_controller_name
			     , lang_short
			  FROM v_virtual_controllers
			 WHERE vico_url_alias = "'.strtolower($url_alias).'"';
			
		$res = $db->dbQuery($sql);
		$nrows = $db->dbNumRows($res);

		if($nrows > 0){

			$reg = $db->dbFetchArray($res);

			if($nrows == 1){
				$result['vcontroller'] = (isset($reg[0]['vico_controller_name'])) ? $reg[0]['vico_controller_name'] : null;
				$result['lang'] = $reg[0]['lang_short'];		
			}
			elseif($nrows > 1){
				foreach($reg as $value){
					if($value['lang_short'] == I18n::getLanguage()){
						$result['lang'] = $value['lang_short'];
						$result['vcontroller'] = $value['vico_controller_name'];
						
					}
				}
			}
			
			return $result; 	
		}
		else{
			return false;
		}
	}

	
	
}
?>