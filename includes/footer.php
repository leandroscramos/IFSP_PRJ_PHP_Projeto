<?php //Util::debug($_SESSION); ?>

<footer class="main-footer" style="border-top: 0"> 
	<div class="row">				
		<div align="center">
			<strong>Hospital Universitário da Universidade Federal de São Carlos - EBSERH</strong><br>					
			<strong>Endereço:</strong> Rua	Luiz Vaz de Camões, nº 111 - Vila Celina<br>
			CEP: 13566-448 - São Carlos - SP - CNPJ: 15.126.437/0022-78<br>
			<strong>Contatos:</strong> (16) 3509-2400 / comunicacao.hufscar@ebserh.gov.br
		</div>				
	</div>		
</footer>

<?php 
	if(isset($_SESSION["flash"])){
		foreach ($_SESSION["flash"] as $key => $value) {
			unset($_SESSION["flash"][$key]);
		}
	}
?>