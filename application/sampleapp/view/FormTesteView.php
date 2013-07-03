<div id="page-top-outer">    

<div id="page-top">

	<div id="logo"><img src="images/logos/grupo_uniasselvi.png" width="102" height="62" alt="Grupo Uniasselvi"/></div>
		
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td></td>
		<!--
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>
		-->
		</tr>
		</table>
	</div>
 	
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat.......................... START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
				
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account">
				<img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" />
			</div>
			
			
			<div class="nav-divider">&nbsp;</div>
			<a href="" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			
			
			<!-- campo de busca -->
			<div id="searchbox">
				<input type="text" value="Pesquisar" onblur="if(this.value=='') this.value='Pesquisar';" onfocus="if(this.value=='Pesquisar') this.value='';" class="top-search-inp" />
			</div>
			<!-- FIM campo de busca -->
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="#nogo"><b>Administrativo</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="current"><li><a href="#nogo"><b>Financeiro</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="#nogo">View all products</a></li>
				<li class="sub_show"><a href="#nogo">Add product</a></li>
				<li><a href="#nogo">Delete products</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>NEAD</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Categories Details 1</a></li>
				<li><a href="#nogo">Categories Details 2</a></li>
				<li><a href="#nogo">Categories Details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Principal</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Clients Details 1</a></li>
				<li><a href="#nogo">Clients Details 2</a></li>
				<li><a href="#nogo">Clients Details 3</a></li>
			 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->
		
</div>

<div class="clear"></div>



<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat........ END -->

  <div class="clear"></div>
 
<!-- start content-outer ............START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Form de Teste</h1>
	</div>
	<!-- end page-heading -->
		
	<div id="formTeste">
	<?php
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
		
		
		
		$form = new Form('form1', 'index');
		
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
	
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer................END -->

<div class="clear">&nbsp;</div>