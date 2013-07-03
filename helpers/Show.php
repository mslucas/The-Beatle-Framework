<?php
class Show {

	public static function varDump($param){
		$result = NULL;
			if($param != NULL){
				foreach($param as $key => $value){
				$result .= '<font color="#cc0000">';
				$result .= $key;
				$result .= '</font> - <font color="#4e9a06">';
				$result .= $value.'</font><br />';
				}	
			}
		echo $result;
	}
	
	
	public static function msg($text){
		echo utf8_decode($text);
	}
	
}
?>