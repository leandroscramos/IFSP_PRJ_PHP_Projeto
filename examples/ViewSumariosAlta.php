<?php 
$titulo="HU Intranet";
include_once $_SESSION["root"].'php/Util/Util.php';
include $_SESSION["root"].'includes/header.php';

//Util::debug($_SESSION);
//Util::debug($data);
?>

	<?php include $_SESSION["root"].'includes/menu.php';?>
	
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->

			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-md-12">
						<div class="box box-aqua">
							<div class="box-header with-border">
								<h3 class="box-title">Relatório de Altas Responsáveis - HU UFSCar</h3>
							</div>
							<div class="box-body">
								<form class="form-horizontal" action="sumariosAltaPdf" method="POST" target="_blank">

									<div class="col-md-4 col-md-offset-4">
										<div class="col-md-6">
											<div class="form-group">
												<label for="dataInicio">Data inicial</label>
												<div class="input-group" align="center">
													<input type="date" class="form-control" id="dataInicio" name="dataInicio" class="form-control" required="">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="dataFim">Data final</label>
												<div class="input-group">
													<input type="date" class="form-control" id="dataFim" name="dataFim" class="form-control" required="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-4 col-md-offset-4">
										<div class="form-group">
											<label class="col-md-12"><button type="submit" name="submitExport" class="btn btn-success btn-block">Exportar</button></label>
											<label class="col-md-12"><button type="reset" class="btn btn-default btn-block">Limpar</button></label>
										</div>
									</div>
								</form>	
								
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- /.content-wrapper -->
</body>
</html>