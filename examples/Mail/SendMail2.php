<?php 


			$destinatarios = "lhcarrara@gmail.com, luis.carrara@ebserh.gov.br lhcarrara@yahoo.com.br";

			$mensagemHTML = "Henrique";

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "Content-Type:text/html; charset=UTF-8\r\n";			
			$headers .= "From: nir.hufscar@ebserh.gov.br\r\n";

			//função que faz o envio do email.
			mail(
				$destinatarios, 
				"Comunicado de Internação Involuntária - Unidade de Saúde Mental - HU UFSCar", 
				$mensagemHTML, 
				$headers
			);  
