<?php 
$titulo="Intranet HU";
include "includes/header.php";
?>

	<header class="main-header">
		<nav class="navbar navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a href="index" class="navbar-brand"><b>HU</b> - UFSCar</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
					</button>
				</div>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<?php 
							if (isset($_SESSION["logado"])) {
						?>
							<li class="dropdown user user-menu">
								<li><a href="logado"><strong><?php echo $_SESSION["login"]["nome"]; ?></strong></a></li>
								<li><a href="logout"><span class="glyphicon glyphicon-log-out"></span></a></li>
							</li>							
						<?php
							} else {
						?>
						<li class="dropdown user user-menu">
							<li><a href="login"><i class="fas fa-sign-in-alt"></i> Login</span></a></li>
						</li>
						<?php 
							}
						?>
					</ul>
				</div>		
			</div>		
		</nav>
	</header>
	
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 form-horizontal">
						<div class="box box-warning">
							<div class="box-header">
								<h3 class="box-title">Documentos Institucionais - Gestão da Qualidade</h3>
							</div>							
        	
							<div class="box-body">
								
								<table id="TabelaDocumentos" class="table table-bordered table-striped">							
									<?php									
										if (!is_null($documents)) {
									?>
									<thead>
										<tr>																					
											<th width="15%">Código</th>											
											<th width="20%">Tipo do Documento</th>
											<th width="25%">Título do Documento</th>											
											<th width="20%">Processo</th>	
											<th width="5%">Versão</th>																					
											<th width="10%">Proxima Revisão</th>											
										</tr>
									</thead>									
									<tbody>	
										<?php
											//Util::debug($documents);										
											foreach ($documents as $document) {
												echo "<tr>";												
												echo "<td><a href='".$_SESSION["upload_pub"]."".$document->getFilenamePdfFinal()."' download><strong>".$document->getCode()."</strong></a></td>";
												echo "<td>".$document->getDocType()[0]->getName()."</td>";
												echo "<td><strong>".$document->getTitle()."</strong></td>";												
												echo "<td>".$document->getProcess()[0]->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($document->getProcess()[0]->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($document->getProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$document->getProcess()[0]->getName()."</td>";
												echo "<td>".str_pad($document->getVersion() , 2 , '0' , STR_PAD_LEFT)."</td>";												
												$revision_date = new DateTime($document->getApprovalDate());
												switch ($document->getDocType()[0]->getRev()) {
													case 0:
														echo "<td><strong>NA</strong></td>";
														break;
													default:
														$revision_date->modify('+'.$document->getDocType()[0]->getRev().' year');
														echo "<td><strong>".$revision_date->format('d/m/Y')."</strong></td>";
														break;													
												}																								
												echo "</tr>";												
											}
										}
										?>										
									</tbody>
								</table>
							</div>
						<!-- /.box-body -->
					  	</div>
					  	<!-- /.box -->						
					</div>
				</div>
			</section>
		</div>		
	</div>
	<!-- /.content-wrapper -->
	<?php include $_SESSION["root"].'includes/footer.php'; ?>
	<script>
	  $(function () {  	
	    $('#TabelaDocumentos').DataTable({		        
			"lengthMenu": [[10], [10]]			
		});
	  });
	</script>
</body>
</html>