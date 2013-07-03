<?php
class Compressor {
	
	
	/**
	 * Inicia o modo de compactacao de html
	 */
	public function html_start(){
			
		function htmlCompress($buffer){
			$search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
			$replace = array('>','<','\\1');
			$buffer = preg_replace($search, $replace, $buffer);
			return $buffer;
		}
		
		ob_start("htmlCompress");
	}
	
	
	
	/**
	 * Faz flush no objeto de compactacao gzip
	 */
	public function html_flush(){
		ob_end_flush();
	}
	
	
		
	
}
?>