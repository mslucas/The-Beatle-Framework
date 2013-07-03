<h1>Envio de SMS</h1>
		
<div id="formTeste">
<?php
	
	$form = new Form('form1', 'sms');
	
	$form->addElement(Form::openFieldset('Destinatário'));
	$form->addElement(Form::inputText('txtFone', 'Fone', 20));
	$form->addElement(Form::inputText('txtMessage', 'Mensagem', 100));
	$form->addElement(Form::closeFieldset());
	$form->addElement(Form::submitButton('Enviar'));
	$form->draw();
		
	if(isset($formemail_msg))
		echo $formemail_msg;
	
	echo Form::aLink('Google', 'http://www.google.com', '_blank');
	
	
?>
</div>