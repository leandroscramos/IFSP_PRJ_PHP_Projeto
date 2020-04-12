<?php 

	class SendMail {
		
		private function mail($recipients, $subject, $message, $headers) {
			mail($recipients, $subject, $message, $headers);
		}

		public function internacaoInvoluntariaUSM($dadosMail){

			// Atribuindo dados preenchidos no formulário para variaveis
			$nome	= $dadosMail['nome'];
			$cpf	= $dadosMail['numero_cpf'];

			// Destinatários (remetente e ouvidoria)
			$recipients = "leandrosc.ramos@gmail.com, leandro.canali@ebserh.gov.br";

			// Montando a mensagem que será enviada.
			$message = "<strong>Nome:  </strong>".$nome."<br>";
			$message .= "<strong>CPF:  </strong>".$cpf."<br>";
			
			$subject = "Comunicado de Internação Involuntária - Unidade de Saúde Mental - HU UFSCar"; 

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "Content-Type:text/html; charset=UTF-8\r\n";			
			$headers .= "From: nir.hufscar@ebserh.gov.br\r\n";

			$this::mail($recipients, $subject, $message, $headers); 			
		}
		
	}