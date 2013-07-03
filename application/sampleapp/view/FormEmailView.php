<h1>Envio de Email</h1>
	
<div id="formTeste">
<?php
	
	$form = new Form('form1', 'email');
	
	$form->addElement(Form::openFieldset('Destinatário'));
	$form->addElement(Form::inputText('txtName', 'Nome', 40));
	$form->addElement(Form::inputMail('txtMail', 'Email'));
	$form->addElement(Form::inputText('txtSubject', 'Assunto', 100));
	$form->addElement(Form::inputText('txtContent', 'Conteúdo', 100));
	$form->addElement(Form::closeFieldset());

	$form->addElement(Form::submitButton('Enviar'));
			
	$form->setFilter(Filters::firstname('Firstname'));
	$form->draw();
		
	if(isset($formemail_msg))
		echo $formemail_msg;
	
	
?>
</div>