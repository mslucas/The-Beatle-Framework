<?php
class DateHelper {
	
	/**
	 * Retorna o mes abreviado e traduzido
	 */
	public static function getMonthDescAbvr($month_number){
		$month_desc = I18n::getText('month'.$month_number);
		return substr($month_desc, 0, 3);
	}
	
	/**
	 * Retorna o dia extraido de uma data de mysql
	 * formato ano-mes-dia
	 */
	public static function getDateAbvr($date_string){
		$result['year'] = substr($date_string, 0, 4);
		$result['month'] = substr($date_string, 5, 2);
		$result['month_desc'] = self::getMonthDescAbvr(substr($date_string, 5, 2));
		$result['day'] = substr($date_string, 8, 2);
		
		return Objects::arrayToObject($result); 	
	}
		
	
}
?>