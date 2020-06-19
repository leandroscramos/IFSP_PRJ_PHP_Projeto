<?php //Util::debug($_SESSION); ?>

<footer class="main-footer" style="border-top: 0"> 
	<div class="row">				
		<div align="center">
			<strong>Instituto Federal de Educação, Ciência e Tecnologia de São Paulo (IFSP campus São Carlos)</strong><br>					
			<strong>Endereço:</strong> Estrada Municipal Paulo Eduardo de Almeida Prado<br>
			CEP: 13565-820 - São Carlos - SP<br>			
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