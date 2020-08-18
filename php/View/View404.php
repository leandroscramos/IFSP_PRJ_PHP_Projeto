<?php 
$titulo="Documentos |SGQ|";
include $_SESSION["root"].'includes/header.php';
?>
<body class="hold-transition">
	<div class="row">
		<div class="login-box" >
			<div id="principal">
				<div class="login-logo">
				    <b>Documentos </b>|SGQ|
				</div>
        <div class="row">        
          <div align="center">
            <img src="<?= $_SESSION["root"] ?> includes/404.png" width="60%"><br>
          </div>
        </div>				
        <div class="row">						
          <div class="col-md-12 text-center">
            <a href="index"><button type="submit" class="btn btn-success btn-block" id="btn_return">Voltar para Página Principal</button></a>
          </div>
        </div>				
			</div>			
		</div>
	</div>
	<?php include $_SESSION["root"].'includes/footer.php'; ?>
</body>
</html>