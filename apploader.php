<?php
error_reporting(E_ALL);

/**
 * Configuracao do autoload
 */
function __autoload($classname){
	
	$basedir = dirname(__FILE__);
	$classname = $classname.'.php';

	if(file_exists($basedir.'//core//'.$classname)){
		require_once($basedir.'//core//'.$classname);
	}
	elseif(file_exists($basedir.'//library//'.$classname)){
		require_once($basedir.'//library//'.$classname);
	}
	elseif(file_exists($basedir.'//helpers//'.$classname)){
		require_once($basedir.'//helpers//'.$classname);
	}	
	elseif(file_exists($basedir.'//interfaces//'.$classname)){
		require_once($basedir.'//interfaces//'.$classname);
	}
	elseif(file_exists($basedir.'//core//commercial//'.$classname)){
		require_once($basedir.'//core//commercial//'.$classname);
	}
	elseif(file_exists($basedir.'//application//'.Config::getDefine('app_id').'//model//'.$classname)){
		include_once($basedir.'//application//'.Config::getDefine('app_id').'//model//'.$classname);
	}
	else {
		echo 'Class not found!';
	}
}

#inicia configuracao
Config::loadConfig(); 

$param_index = 0;
$controller_name = '';

if(!Config::getDefine('maintenance')){
	#se controller e action for vazio, mostra pag. inicial
	$key = (isset($_GET['key']) ? $_GET['key'] : '/index/main'); 
	#limpa espacos em branco e passa td pra minusculo
	$key = strtolower(trim($key));
	#quebra url em array para carregar parametros
	$key = explode('/', $key);
	
	if(!$key[0] == '/'){
		$param_index++;
	}
	
	$url['controller'] = (isset($key[$param_index]) ? ucfirst($key[$param_index]).'Controller' : '');
	$controller_name = strtolower($key[$param_index]);
	$param_index++;
}
else {
	$url['controller'] = 'MaintenanceController';
}

$url['action']     = (isset($key[$param_index]) ? $key[$param_index] : '');
$param_index++;
$url['parameter']  = (isset($key[$param_index]) ? $key[$param_index] : '');

$controller_file = '../controller/'.$url['controller'].'.php';

#se o controlador existe...
if(file_exists($controller_file)){
	require_once($controller_file);
	$app = new $url['controller']();
	
	#se a action esta vazia, redireciona para action {main}
	if($url['action'] == ''){
		$url['action'] = 'main';
	}
	
	#se a action existe, instancia ela e passa o param
	if(method_exists($app, $url['action'])){
		$app->$url['action']($url['parameter']);
	}
	#se a action nao existe
	else {
		$error = new Errors();
		$error->code = '1001';
		$error->obj = $url;
		$error->showError();
	}
	
}
#se o controlador nao existe...
#procura por virtual controllers no DB
/*
elseif($vcontroller = Controller::getVirtualController($controller_name)){

	#muda a linguagem caso o virtual controller seja de outro idioma
	if($vcontroller['lang'] != I18n::getLanguage()){
		I18n::setLanguage($vcontroller['lang']);
		header('Location: '.$_SERVER['REQUEST_URI']);
		exit;
	}
	else{

		$vcontroller_name = ucfirst($vcontroller['vcontroller']).'Controller';
		$vcontroller_file = '../controller/'.$vcontroller_name.'.php';

		require_once($vcontroller_file);
		
		$app = new $vcontroller_name();
		
		#se a action esta vazia, redireciona para action {main}
		if($url['action'] == ''){
			$url['action'] = 'main';
		}
		
		#se a action existe, instancia ela e passa o param
		if(isset($app->magic_methods) && $app->magic_methods == true || method_exists($app, $url['action'])){
			$app->$url['action']($url['parameter']);
		}
		#se a action nao existe
		else {
			$error = new Errors();
			$error->code = '1001';
			$error->obj = $url;
			$error->showError();
		}
	}
}*/
else{
	$error = new Errors();
	$error->code = '1000';
	$error->obj = $url;
	$error->showError();
}




?>