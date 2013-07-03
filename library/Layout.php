<?php
class Layout {
	
	private $compressor;
		
	function __construct(){
		$this->compressor = new Compressor();
	}
	
	
	/**
	 * 	Inclui header da pagina
	 * 
	 */
	protected function loadHeader($params){
		$favicon = (file_exists('images/favicon.ico') ? 'images/favicon.ico' : Config::getDefine('cdn_images').'favicon.ico');
		
		if(Config::getDefine('html5') == TRUE){
			$content  = '<!DOCTYPE html>';
			$content .= '<html lang="'.I18n::getLanguage().'">';
			$content .= '<head>';
			$content .= '<meta charset="'.Config::getDefine('page_encoding').'" />';
			$content .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
			$content .= '<meta name="viewport" content="width=device-width">';
			$content .= '<meta name="description" content="'.Config::getDefine('page_description').'">';
			$content .= '<meta name="author" content="'.Config::getDefine('page_author').'">';
		}
		else{
			$content  = '<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Strict/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
			$content .= '<html xmlns="http:/www.w3.org/1999/xhtml">';
			$content .= '<head>';
			$content .= '<meta http-equiv="Content-type" content="text/html; charset='.I18n::getLanguage().'" />';
		}
		
		$title = (isset($params['title']) ? $params['title'].' - ' : '');
		$content .= '<title>'.Encoding::utf8_decode($title).Config::getDefine('title').'</title>';
		$content .= '<link rel="shortcut icon" href="'.$favicon.'"/>';
		
		#include css files
		$content .= $this->includeCss($params);

		#booststrap CSS
		$content .= '<link rel="stylesheet" href="'.Config::getDefine('cdn_bootstrap').'css/bootstrap.min.css" type="text/css" media="all" />';	
		$content .= '<link rel="stylesheet" href="'.Config::getDefine('cdn_bootstrap').'css/bootstrap-responsive.min.css" type="text/css" media="all" />';

		$content .= '</head>';
		$content .= '<body>';
		
		return $content;
	}
		
	
	
	/**
	 * 	Inclui o footer da pagina
	 */	
	protected function loadFooter($params){
		#JQUERY
		$content  = '<script src="'.Config::getDefine('cdn_jquery').'js/jquery-1.9.1.min.js"></script>';
		
		$content .= '<script src="'.Config::getDefine('cdn_bootstrap').'js/bootstrap.min.js"></script>';
				
		#dynamic js includes
		$content .= $this->includeJs($params);
		
		#inicio script document-ready
		$content .= '<script type="text/javascript">';
		$content .= '$(document).ready( function(){ ';
		
		#add dynamic classes
		if(isset($params['addclass']) && is_array($params['addclass'])){
			foreach($params['addclass'] as $key => $value){
				$tmp = explode(',', trim($value));
				$selector_id = $tmp[0];
				$class_name = $tmp[1];
				$content .= ' $("#'.$selector_id.'").addClass("'.$class_name.'"); ';
			}
		}

		#se houver filtros de validacao, acrescenta-os no document-ready
		if(isset($GLOBALS['filtros']) && $GLOBALS['filtros'] != NULL && isset($GLOBALS['formname']) && $GLOBALS['formname'] != ''){
			$filtros  = $GLOBALS['filtros']; 
			$formname = $GLOBALS['formname'];
			$GLOBALS['filtros'] = null;
			$GLOBALS['formname'] = null;
			
			#varre em busca de mascaras de validacao
			foreach ($filtros as $key => $value) {
				foreach ($value as $key2 => $value2){
					if($key2 == 'mask'){
						$content .= ' '.$value2.' ';
					}
				}
			}
			
			//acrescenta validacao de form
			$content .= $this->formValidation($formname, $filtros);
		}

		#fim document-ready
		$content .= ' }); ';
		$content .= '</script>';
		
		
		#calcule execution time
		/*
		$time_end = microtime(true);
		$time = $time_end - $params['time_start'];
		$content .= 'Execution time: '.$time;
		*/
		
		#add Google Analytics to header
		#ignore google analytics in localhost domain
		if(!Config::isLocal()){
			$content .= GoogleAnalytics::addTracker(Config::getDefine('ga_code'));	
		}
		
		$content .= '</body>';
		$content .= '</html>';
		return $content;
	}

	
	/**
	 * Monta o javascript da validacao de forms
	 */
	private function formValidation($formname, $filtros){
		
		$content = '$("#'.$formname.'").validate({ ';
		
		#montagem das regras
		$content .= 'rules:{';	
		foreach($filtros as $key => $value){
			$content .= $value['fieldname'].':{ '.$value['rules'].' }, ';
		}
		$content .= '},';
		
		#mensagens de regras
		$content .= 'messages:{';	
		foreach($filtros as $key => $value){
			$content .= $value['fieldname'].':{ '.$value['message'].' }, ';
		}
		$content .= '}';
			
		$content .= ' });';
		
		return $content;
	}

	
	/**
	 * 	Carrega a view passando parametros e montando a pagina
	 * 
	 */
	public function loadView($viewname, $params=null){
		
		if(is_array($params) && count($params) > 0){
			extract($params, EXTR_PREFIX_ALL, $viewname);
		}
		
		$params['time_start'] = microtime(true);
		
		#verifica se o controller requer autenticacao
		/*
		if(isset($params['req_auth']) && $params['req_auth'] == TRUE){
			if(!Auth::isLogged()){
				$domain = URL::getDomain('full');
				$url = 'https:/login.'.$domain;
				header('Location: '.$url.'/');
				exit;
			}
		}
		*/
		
		#verifica qual skin esta setado
		if(isset($params['skin']) && $params['skin'] != NULL){
			$basedir = dirname(dirname(__FILE__));	
			$skinName = $params['skin'].'Skin';
			$skinFileName = $skinName.'.php';
			
			if(file_exists($basedir.'/application/'.Config::getAppName().'/skins/'.$skinFileName)){
				include_once($basedir.'/application/'.Config::getAppName().'/skins/'.$skinFileName);	
			}
			elseif(file_exists($basedir.'/skins/'.$skinFileName)){
				include_once($basedir.'/skins/'.$skinFileName);	
			}
			else{
				$error = new Errors();
				$error->code = '1003';
				$error->obj = $params['skin'];
				$error->showError('c');	
			}
			
			$skin = new $skinName();
		}
		
		if(Config::getDefine('gzip')){
			$this->compressor->html_start();	
		}
		
		if(!isset($params['webservice']) OR $params['webservice'] == FALSE){
			echo $this->loadHeader($params);	
		}
		
		
		#skin header
		if(isset($params['skin']) && $params['skin'] != NULL){
			echo $skin->skinHeader($params);
		}
		
		include_once('../view/'.$viewname.'View.php');
		
		#skin footer
		if(isset($params['skin']) && $params['skin'] != NULL){
			echo $skin->skinFooter($params);
		}
		
		if(!isset($params['webservice']) OR $params['webservice'] == FALSE){
			echo $this->loadFooter($params);
		}
		
		if(Config::getDefine('gzip')){
			$this->compressor->html_flush();
		}
	}



	/**
	 * 	Inclui arquivos Javascript
	 * 
	 */
	public static function includeJs($params){
		
		$content = '';
		
		$publicAppJsBase = Config::getDefine('public_url').'/js/';
		$publicCdnJsBase = Config::getDefine('cdn_js'); 
		$basedir = dirname(dirname(__FILE__));
		$pathAppJsBase = $basedir.'/application/'.Config::getAppName().'/public/js/';
		$pathCdnJsBase = $basedir.'/cdn/js/';
		
		if(is_array($params) && isset($params['js'])){
			foreach ($params['js'] as $value) {
				$jsFileName = $value.'.js';
			
				if(file_exists($pathAppJsBase.$jsFileName)){
					$content .= '<script src="'.$publicAppJsBase.$jsFileName.'" type="text/javascript"></script>';
				}
				elseif(file_exists($pathCdnJsBase.$jsFileName)){
					$content .= '<script src="'.$publicCdnJsBase.$jsFileName.'" type="text/javascript"></script>';	
				}
				else{
					$error = new Errors();
					$error->code = '1004';
					$error->obj = $jsFileName;
					$error->showError('w');
				}
			}
		}
		
		return $content;
	}
	
	
	/**
	 * 	Inclui arquivos CSS
	 * 
	 */
	public static function includeCss($params){
		$content = '';
		$basedir = dirname(dirname(__FILE__));
		$publicAppCssBase = Config::getDefine('public_url').'/css/';
		$pathAppCssBase = $basedir.'/application/'.Config::getAppName().'/public/css/';
		$pathCdnCssBase = $basedir.'/cdn/css/';
		
		if(is_array($params) && isset($params['css'])){
			foreach ($params['css'] as $value){
				$cssFileName = $value.'.css';
				
				if(file_exists($pathAppCssBase.$cssFileName)){
					$content .= '<link rel="stylesheet" href="'.$publicAppCssBase.$cssFileName.'" type="text/css" media="all" />';	
				}
				elseif(file_exists($pathCdnCssBase.$cssFileName)){
					$content .= '<link rel="stylesheet" href="'.Config::getDefine('cdn_css').$cssFileName.'" type="text/css" media="all" />';	
				}
				else{
					$error = new Errors();
					$error->code = '1004';
					$error->obj = $cssFileName;
					$error->showError('w');
				}
			}
		}

		return $content;
	}
	
	
	
}    
?>