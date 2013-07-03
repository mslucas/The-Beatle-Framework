<?php
require('commercial/PHPMailer_5.2.1/class.phpmailer.php');
require('commercial/PHPMailer_5.2.1/class.smtp.php');

class Email extends PHPMailer {
	
	private static $mail_defs;
	

	
	/**
	 * Envia email para alguem
	 */
	public static function sendMail($address, $name, $subject, $content){
		
		self::$mail_defs = Config::getDefine('email');

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->SMTPDebug  = 1;
		$mail->Host     = self::$mail_defs['server_host'];
		$mail->Port		= self::$mail_defs['server_port'];
		$mail->Username = self::$mail_defs['sender_username'];
		$mail->Password = self::$mail_defs['sender_passwd'];
		$mail->SetFrom(self::$mail_defs['sender_address'], self::$mail_defs['sender_name']);
		
		$mail->IsHTML(self::$mail_defs['is_html']);
	
		$mail->AddAddress($address, $name);
		$mail->Subject = $subject;
		$mail->AltBody = 'conteudo';
		
		//$content = preg_replace('/[\]/','', $content);
		$mail->MsgHTML($content);
		//$mail->AddAttachment("images/phpmailer.gif");      // attachment
		//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
		
		if(!$mail->Send()){
			$result .= 'A Mensagem nao pode ser enviada.';
			$result .= 'Mailer Error: '.$mail->ErrorInfo;
		}
		else{
			$result .= 'Mensagem enviada com sucesso!';
		}
		
		return $result;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>