<?php
abstract class Calculator {
	
	/**
	 * Calcula idade do cara
	 */
	public static function ageCalc($date){
		list($day, $month, $year) = explode('/', $date);
		$day_diff   = date("d") - $day;
		$month_diff = date("m") - $month;
    	$year_diff  = date("Y") - $year;
    	if($day_diff < 0 || $month_diff < 0){ $year_diff--;}
		return $year_diff;
	}
	
	
	
	
}
?>