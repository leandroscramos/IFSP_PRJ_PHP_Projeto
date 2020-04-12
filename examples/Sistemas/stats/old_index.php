<!DOCTYPE html>
<html>
<head>

	<!-- Head--> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Intranet HU-UFSCar</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="../../template/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../template/font-awesome-4.7.0/css/font-awesome.min.css">  
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../template/ionicons-2.0.1/css/ionicons.min.css"> 
	<!-- jvectormap 
	<link rel="stylesheet" href="template/plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
	<!-- Theme style -->
	<link rel="stylesheet" href="../../template/dist/css/AdminLTE.min.css">  
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../../template/dist/css/skins/_all-skins.min.css">
	
	<!-- JQuery UI -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<script>
		$( function() {
			$( "#dataInicio" ).datepicker({
				dateFormat: 'dd/mm/yy',
				dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
				dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
				dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
				monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior',
			});
		} );
		$( function() {
			$( "#dataFim" ).datepicker({
				dateFormat: 'dd/mm/yy',
				dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
				dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
				dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
				monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior',
			});
		} );
	</script>

</head>


<?php
	if(isset($_POST['submitExport'])):

		$lista = $_POST['lista'];
		var_dump($lista);
		$dataInicio = $_POST['dataInicio'];
		var_dump($dataInicio);
		$dataFim = $_POST['dataFim'];
		var_dump($dataFim);

		$filename = $lista; //"sql1.txt";
		$filehandle = fopen($filename,"r") or die("Error: Unable to open SQL file: ".$filename);
		$sql = fread($filehandle, filesize($filename));
		
		$sql = str_replace("#data_ini",$dataInicio, $sql);
		$sql = str_replace("#data_fim",$dataFim, $sql);
		fclose($filehandle);
		echo "<pre>";
		print_r($sql);
		echo "</pre>";
		
	endif;

?>


<body class="hold-transition gray-light collapsed-sidebar">

	<!-- Topo -->
	<div class="row">
		<div align="left" class="col-md-6">
			<img alt="Intranet" src="../../includes/img/logo_intranet.png" />
		</div>
		<div align="right" class="col-md-6">
			<img alt="HU-UFSCar/EBSERH" src="../../includes/img/logo_ebserh.png" />
		</div>
	</div>

	<!-- Menu -->    
    <?php include_once "../../menu.php"; ?>

	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->

			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Extração de dados</h3>
							</div>
							<div class="box-body">
								<!--<form class="form-horizontal" action="" method="POST"> -->
								<form class="form-horizontal" action="csv.php" method="POST" target="_blank">

									<div class="col-md-6 col-md-offset-3">
										<div class="col-md-12">
											<div class="form-group">
												<label for="lista">Dados</label>
												<select class="form-control" id="lista" name="lista" width="100%" required autofocus>
													<option selected disabled>Selecione</option>
													<option value="classificacao_risco.txt">				Classificação de risco</option>
													<option value="aghu_consultas_multi.txt">				Consultas multiprofissionais</option>
													<option value="aghu_consumo_materiais_comp.txt">		Consumo de materiais por competência</option>
													<option value="exames_laboratoriais.txt">				Exames laboratoriais</option>
													<option value="exames_solicitados_por_unidade.txt">		Exames laboratoriais solicitados por unidade funcional</option>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6 col-md-offset-3">
										<div class="col-md-12">
											<div class="form-group">
												<label for="dataInicio">Data inicial</label>
												<div class="input-group" align="center">
													<input type="text" size="100%" class="form-control" id="dataInicio" name="dataInicio" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="dataFim">Data final</label>
												<div class="input-group">
													<input type="text" size="100%"class="form-control" id="dataFim" name="dataFim" class="form-control">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-6 col-md-offset-3">
										<div class="form-group">
											<label class="col-md-12"><button type="submit" name="submitExport" class="btn btn-success btn-block">Exportar</button></label>
											<label class="col-md-12"><button type="reset" class="btn btn-danger btn-block">Limpar</button></label>
										</div>
									</div>
								</form>	
								
							</div>
						</div>
					</div>
				</div>

			</section>

		<!-- Rodapé -->
		<?php include_once "../../includes/footer.php"; ?>
		<?php include_once "../../includes/js.php"; ?>

		</div>
		
	</div>
	<!-- /.content-wrapper -->
</body>
</html>