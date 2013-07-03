<?php
abstract class GoogleAnalytics {
	
	/**
	 * Acrescenta o cod de rastreio do 
	 * Google Analytics
	 */
	public static function addTracker($ga_code){
		
		$content  = '<script type="text/javascript">';
		$content .= 'var _gaq = _gaq || []; ';
		$content .= '_gaq.push([\'_setAccount\', \''.$ga_code.'\']); ';
		$content .= '_gaq.push([\'_trackPageview\']); ';
		$content .= '(function(){ ';
		$content .= 'var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true; ';
		$content .= 'ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\'; ';
		$content .= 'var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s); ';
		$content .= '})();';
		$content .= '</script>';
		
		return $content;
	}
	
	
	
}
?>