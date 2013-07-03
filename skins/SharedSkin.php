<?php
class SharedSkin implements SkinInterface {
	
	public static function skinHeader($param){
		$content  = '';
		$content .= 'SHARED SKIN :: SHARED SKIN :: SHARED SKIN :: SHARED SKIN :: SHARED SKIN :: SHARED SKIN :: SHARED SKIN<br />';
		
		if(!Config::getDefine('maintenance')){
			$content .= self::topMenuBar();
		}
		
		return $content;
	}
	
	public static function skinFooter($param){
		$content  = '';
		$content  = '<div id="footer">';
		$content .= '<div id="footer-left">';
		$content .= 'Copyright &copy; 2012 ';
		$content .= Form::aLink('The Beatle Framework', 'https://code.google.com/p/thebeatle-framework/', '_blank');
	    $content .= '. All rights reserved.';
		$content .= '<span>Version '.Config::getDefine('version').'</span></div>';
		$content .= '<div class="clear">&nbsp;</div>';
		$content .= '</div>';
		
		return $content;
	}
	
	
	
	/**
	 * Create top menu bar
	 */
	private static function topMenuBar(){
		$content  = '<div id="top_bar">';
		$content .= '<img src="'.Config::getDefine('cdn_images').'logo88x25.png" class="logo" alt="The Beatle Framework" />';
		$content .= '<ul>';
		$content .= '<li id="bt_home"><a href="index">home</a></li>';
		$content .= '<li id="bt_email"><a href="email">email</a></li>';
		$content .= '<li id="bt_sms"><a href="sms">sms</a></li>';
		$content .= '<li id="bt_contact"><a href="contact">contact</a></li>';
		$content .= '<li id="bt_deploy"><a href="deploy">svn deploy</a></li>';
		$content .= '</ul>';
		$content .= '</div>&nbsp;';
		
		return $content;
	}
	
	
}
?>		