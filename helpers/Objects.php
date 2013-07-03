<?php
class Objects {
	
	/**
	 * Converte array em objeto
	 */
	public static function arrayToObject($array){
		$object = new stdClass();
		if(is_array($array) && count($array) > 0){
	    	foreach($array as $name=>$value){
	    		$name = strtolower(trim($name));
	      		if(!empty($name)){
	        		$object->$name = $value;
	      		}
	    	}
	  	}
		return $object;
	}
	
	
	
	
	
}
?>