<h1>Contact</h1>
	
<div id="formTeste">
<?php
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
	
	
	$form = new Form('form1', 'contact');
	
	$form->addElement(Form::openFieldset('Dados Pessoais'));
	$form->addElement(Form::inputText('Firstname', 'Nome', 40));
	$form->addElement(Form::inputText('Lastname', 'Sobrenome', 40));
	$form->addElement(Form::inputMail('txtEmail', 'Email'));
	
	$group = new FormGroup('Sexo');
	$group->addToGroup(Form::inputRadio('sexo', 'Masculino', 'male', true));
	$group->addToGroup(Form::inputRadio('sexo', 'Feminino', 'female'));
	$form->addElement($group->getGroup());
	$form->addElement(Form::closeFieldset());
	
	$form->addElement(Form::openFieldset('Informações Adicionais'));
	$form->addElement(Form::inputText('address', 'Endereço', 40));
	$form->addElement(Form::inputText('city', 'Cidade', 40));
	$group = new FormGroup('Categoria Planetária');
	$group->addToGroup(Form::inputCheckbox('alien', 'Alienígena', 'yes'));
	$form->addElement($group->getGroup());
	$form->addElement(Form::closeFieldset());
			
	$form->addElement(Form::submitButton('Cadastrar'));
			
	$form->setFilter(Filters::firstname('Firstname'));
	$form->setFilter(Filters::lastname('Lastname'));
	
	$form->draw();
			
	var_dump($_POST);
	
	//Config::echoDefine('title');	
	
	//Session::unsetSession();
	//Session::setSession('nome', 'John Mack Brother');	
	//echo Session::getSession('nome');
	//Session::statusSession();
	
	//Cookies::setCookie('nome', 'Marcos Lucas');
	//echo Cookies::getCookie('nome');
	//Cookies::clearCookie('nome');
	//Cookies::destroyCookies();	
	

?>
</div>