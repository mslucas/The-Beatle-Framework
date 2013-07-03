<?php

class SsoSkin implements SkinInterface {
	
	public static function skinHeader($param){
			
		$content  = self::topMenuBar();
		$content .= '<div class="container-fluid" id="mainContent">';

		return $content;
	}
		
	public static function skinFooter($param){
		
		$cdn_images_url = Config::getDefine('cdn_images');	
		$set_language_url = Config::getDefine('public_url').'/language/set/';

		$content  = '<hr>';
		$content .= '<footer>';
        $content .= '<div style="">';
        $content .= '<span class="">&copy; '.Config::getDefine('title').' '.date('Y').'</span>';
        $content .= '<img src="'.$cdn_images_url.'kroton_m.jpg" alt="logo kroton" class="pull-right"/>';
        $content .= '</div>';
        $content .= '<div id="i18n_flags" style="">';
        //$content .= '<a href="'.$set_language_url.'en-uk"><img src="'.$cdn_images_url.'flag_en-uk.png" alt="English UK" border="0"></a> &nbsp;';
		$content .= '<a href="'.$set_language_url.'en-us"><img src="'.$cdn_images_url.'flag_en-us.png" alt="English USA" border="0"></a> &nbsp;';
		$content .= '<a href="'.$set_language_url.'es"><img src="'.$cdn_images_url.'flag_es.png" alt="Espanhol" border="0"></a> &nbsp;';
		$content .= '<a href="'.$set_language_url.'pt-br"><img src="'.$cdn_images_url.'flag_pt-br.png" alt="Português Brasileiro" border="0"></a>';
      	$content .= '</div>';
        $content .= '</footer>';
		$content .= '</div>';
	
		return $content;
	}
		
	/**
	 * top menu bar
	 */
	private static function topMenuBar(){
		
		$cdn_images_url = Config::getDefine('cdn_images');
        
		$content  = '<div class="navbar navbar-inverse navbar-fixed-top">';
      	$content .= '<div class="navbar-inner">';
        $content .= '<div class="container-fluid">';
        /*
        $content .= '<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">';
        $content .= '<span class="icon-bar"></span>';
        $content .= '<span class="icon-bar"></span>';
        $content .= '<span class="icon-bar"></span>';
        $content .= '</button>';
        */
        $content .= '<a class="pull-left" href="'.Config::getDefine('public_url').'"><img src="'.$cdn_images_url.'grupo_uniasselvi.png" alt="logo grupo uniasselvi" border="0" style="margin:3px;"></a>';
        //$content .= '<a class="brand" href="'.Config::getDefine('public_url').'">'.ucfirst(I18n::getText('sso')).'</a>';
        
        //$content .= '<div class="nav-collapse collapse">';

        //$content .= '<ul class="nav">';
        //$content .= '<li id="bt_home"><a href="'.Config::getDefine('public_url').'"><i class="icon-home icon-white"></i> '.ucfirst(I18n::getText('dashboard')).'</a></li>';
        /*             
        $content .= '<li class="dropdown">';
        $content .= '<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-plane icon-white"></i> '.ucfirst(I18n::getText('ourpackages')).' <b class="caret"></b></a>';
        $content .= '<ul class="dropdown-menu">';

        $tripsByThemes = TopMenuBarModel::getPackagesByLang();

        if(sizeof($tripsByThemes) >= 1){
            $last_theme = null;
            $theme_count = 0;
            foreach($tripsByThemes as $value){
                if($value['them_name'] != $last_theme){
                    $content .= ($theme_count > 0) ? '<li class="divider"></li>' : '';
                    $content .= '<li class="nav-header">'.ucfirst(utf8_encode($value['them_name'])).'</li>';
                    $last_theme = $value['them_name'];
                    $theme_count++;
                }
                $content .= '<li><a href="'.$offer_base_url.$value['trip_url_alias'].'">'.ucfirst(utf8_encode($value['trip_title'])).'</a></li>';
            }
        }
        #no trips for this lang
        else{
            $content .= '<div class="alert alert-error">'.ucfirst(I18n::getText('noTripsInThisLanguage')).'</div>';
        }
        
        $content .= '</ul>';
        $content .= '</li>';
        */      

        /*
        $content .= '<li id="bt_themes" class="dropdown">';
        $content .= '<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe icon-white"></i> '.ucfirst(I18n::getText('themes')).' <b class="caret"></b></a>';
        $content .= '<ul class="dropdown-menu">';

        foreach($themes as $value){
        	$content .= '<li><a href="'.Config::getDefine('public_url').'/'.I18n::getText('themes').'/'.StringHelper::removeAcentos(utf8_encode($value['them_name'])).'">'.ucfirst(utf8_encode($value['them_name'])).'</a></li>';	
        }	

        $content .= '</ul>';
        $content .= '</li>';  
        */

        //$latestoffers_url = Config::getDefine('public_url').'/'.StringHelper::removeAcentos(str_replace(' ', '', I18n::getText('latestoffers')));
        
        //$content .= '<li id="bt_latestoffers"><a href="'.$latestoffers_url.'"><i class="icon-star icon-white"></i> '.ucfirst(I18n::getText('latestoffers')).'</a></li>';
        //$content .= '<li id="bt_support"><a href="'.Config::getDefine('public_url').'/'.I18n::getText('support').'"><i class="icon-envelope icon-white"></i> '.ucfirst(I18n::getText('support')).'</a></li>';
        //$content .= '<li id="bt_annotations"><a href="'.Config::getDefine('public_url').'/annotations"><i class="icon-pencil icon-white"></i> '.ucfirst(I18n::getText('support')).'</a></li>';
        
        //$content .= '</ul>';
        
        /*
        $content .= '<div class="btn-group pull-right">';
        $content .= '<a class="btn" href="#"><i class="icon-user"></i> '.ucfirst(I18n::getText('myaccount')).'</a>';
        $content .= '<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>';
        $content .= '<ul class="dropdown-menu">';
        $content .= '<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>';
        $content .= '<li><a href="#"><i class="icon-trash"></i> Delete</a></li>';
        $content .= '<li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>';
        $content .= '<li class="divider"></li>';
        $content .= '<li><a href="#"><i class="i"></i> Make admin</a></li>';
        $content .= '</ul>';
        $content .= '</div>';
        */

        //$content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';

		return $content;
	}
	
}
?>		