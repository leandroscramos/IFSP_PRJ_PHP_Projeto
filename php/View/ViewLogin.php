<?php 
$titulo="Documentos |SGQ|";
include $_SESSION["root"].'includes/header.php';
?>
<body class="hold-transition login-page">
	<div class="row">
		<div class="login-box" >
			<div id="principal" >
				<div class="login-logo">
				    <b>Documentos </b>|SGQ|
				</div>
				<form action="postLogin" method="POST" class="center-block">
					<div class="row">						
						<div class="col-md-12 text-center">
							<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='alert alert-danger bg-red color-palette'>".$_SESSION["flash"]["msg"]."</div>";
							} ?>
							<div class="form-group has-feedback">
								<label for="login" class="sr-only">Login:<span class="requerido">*</span></label>
								<input type="text" name="usuario" class="form-control" id="login" placeholder="Usuário" required 
									value="<?php if(isset($_SESSION["flash"]["login"]))echo $_SESSION["flash"]["login"];?>">
								<span class="glyphicon glyphicon-user form-control-feedback"></span>							
							</div>
							<div class="form-group has-feedback">
								<label for="pwd" class="sr-only">Senha:<span class="requerido">*</span></label>
								<input type="password" name="senha" class="form-control" id="pwd" placeholder="Senha" required>
								<span class="glyphicon glyphicon-lock form-control-feedback"></span> 
							</div>
							<button type="submit" class="btn btn-success btn-block">Entrar</button>
						</div>
			  		</div>
				</form>
			</div>			
		</div>
	</div>
	<?php include $_SESSION["root"].'includes/footer.php'; ?>
	<script language="javascript">
		document.getElementById('login').focus();
	</script>
</body>
</html>