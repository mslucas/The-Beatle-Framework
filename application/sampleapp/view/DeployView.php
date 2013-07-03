<br>
<h1>SVN Deploy Control</h1>

<a href="#" class="mainbutton">my button</a>	

<div class="buttons">
    <button type="button" class="positive"><img src="./images/icons/tick.png" alt=""/>Save</button>
    <a href="#"><img src="./images/icons/textfield_key.png" alt=""/>Change Password</a>
    <a href="#" class="negative"><img src="./images/icons/cross.png" alt=""/>Cancel</a>
</div>
	
	<br /><br /><br /><br /><br /><br />
	
<?php 
	$c = new Cache();
	
	//$c->add('bitch', array('renan', 'kitah', 'mikon'), 10);
	//$c->replace('bitch', array('renan', 'kitah', 'mikona'), 2);
	//$c->delete('bitch');
	//$c->flushObjects();
	
	echo ($c->ifExist('bitch') ? 'tem!' : 'nao tem!');
	
	echo '<br><br>';
	
	Show::varDump($c->get('bitch'));
	
	echo $c->serverStatus();
?>
	
<div id="formTeste">
<?php
	
	//Show::varDump($reflection->getMethods());
	
	//die(URL::getDomain('full'));

	/*
	$db = new DB('oracle');
	
	$bind_sql[':p_codi'] = '674829';
	
	$sql = '
		SELECT *
		  FROM pessoa
		 WHERE pess_codi = :p_codi';
	
	$res = $db->dbQuery($sql, $bind_sql);
	//$reg = $db->dbFetchArray($res);
	$obj = $db->dbFetchObject($res);
	
	echo $db->dbNumRows($res).' registro(s) encontrado(s).<br>';
	echo $db->dbNumCols($res).' coluna(s) retornada(s).<br>';
	echo 'A query foi '.$db->dbSqlType($res).'.<br>';
			
	$finfo = $db->dbFieldInfo($res, 10);
	var_dump($finfo);
	
	//var_dump($obj);
	echo $obj->PESS_NOME.'<br>';
	
	echo 'Servidor Oracle: '.$db->dbServerVersion().'<br>';
	//echo 'Cliente Oracle: '.$db->dbClientVersion().'<br>'; //após atualizar para php 5.3.7
	*/
	if(!isset($_POST['action'])){
		$_POST['action'] = 'stop';
	}
	
	
	$form = new Form('form1', 'deploy');
	
	$form->addElement(Form::openFieldset('Process Action'));
	
	$group = new FormGroup('Action');
	$group->addToGroup(Form::inputRadio('action', 'Start', 'start', ($_POST['action'] == 'start' ? true : false)));
	$group->addToGroup(Form::inputRadio('action', 'Stop', 'stop', ($_POST['action'] == 'stop' ? true : false)));
	
	$form->addElement($group->getGroup());
	$form->addElement(Form::closeFieldset());
	/*
	$form->addElement(Form::openFieldset('Informações Adicionais'));
	$form->addElement(Form::inputText('address', 'Endereço', 40));
	$form->addElement(Form::inputText('city', 'Cidade', 40));
	$group = new FormGroup('Categoria Planetária');
	$group->addToGroup(Form::inputCheckbox('alien', 'Alienígena', 'yes'));
	$form->addElement($group->getGroup());
	$form->addElement(Form::closeFieldset());
	*/		
	$form->addElement(Form::submitButton('Save'));
			
	//$form->setFilter(Filters::firstname('Firstname'));
	//$form->setFilter(Filters::lastname('Lastname'));
	
	$form->draw();
	
	
	$control  = Form::openFieldset('Monitoring');
	$control .= Form::inputButton('bt_start', 'Start');
	$control .= Form::inputButton('bt_stop', 'Stop');
	$control .= '<div id="status">status: stoped!</div>';
	$control .= Form::closeFieldset();
	echo $control;
			
	//Config::echoDefine('title');	
	
	//Session::unsetSession();
	//Session::setSession('nome', 'John Mack Brother');	
	//echo Session::getSession('nome');
	//Session::statusSession();
	
	//Cookies::setCookie('nome', 'Marcos Lucas');
	//echo Cookies::getCookie('nome');
	//Cookies::clearCookie('nome');
	//Cookies::destroyCookies();	
	
	if($_POST['action'] == 'start'){
		$file = dirname(dirname(dirname(dirname(__FILE__)))).'\tools\daemon\process.php';
		
		//$result = shell_exec("php $file");
		//exec("php $file", $result);
		/*
		for($i=0; $i < sizeof($result); $i++){ 
			echo $result[$i].'<br>';	
		}
		*/
		//echo $result;
	}
?>
</div>

<div id="texto_title">output log monitor</div>
<div id="texto">&nbsp;</div>