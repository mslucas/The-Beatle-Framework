<?php
class IndexModel {

	
	
	public static function getMainpageOffers($limit=9, $lang=null){
		
		if($lang == null){
			$lang = I18n::getLanguage();
		}

		$db = new DB();
		
		$sql = '
			SELECT trip_title
			     , trip_description
			     , trip_url_alias
			     , mpof_image_url
			  FROM mainpage_offers
			     , trips
			     , languages
		     WHERE trip_id = mpof_trip_id
		       AND lang_id = trip_lang_id
		       AND lang_short = "'.$lang.'"
		  ORDER BY mpof_order ASC
		     LIMIT '.$limit.'';
			
		$res = $db->dbQuery($sql);
		$reg = $db->dbFetchArray($res);
			
		return $reg;	
	}
	

	public static function getSysdate(){
		$db = new DB();
		
		$sql = '
			SELECT sysdate from dual';
			
		$res = $db->dbQuery($sql);
		$reg = $db->dbFetchArray($res);
			
		return $reg;
	}
	
		
	
}
?>