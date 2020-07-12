<?php 
$titulo="Intranet HU";
include "includes/header.php";
?>

<?php include "includes/menu.php";?>
	
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 form-horizontal">
						<div class="box box-success">
							<div class="box-header">
								<h3 class="box-title">Lista de Documentos submetidos para o Setor de Gestão da Qualidade</h3>
							</div>							
						<!-- /.box-header -->
							<div class="box-body">
								<table id="TabelaDocumentos" class="table table-bordered table-striped">							
								<?php									
									if (!is_null($documents)) {
								?>
									<thead>
										<tr>
											<th width="15%">Código</th>											
											<th width="20%">Tipo do Documento</th>
											<th width="40%">Título do Documento</th>
											<th width="5%">Versão</th>
											<th width="8%">Status</th>											
											<th width="12%">Data da Submissão</th>											
											<!--
											<th width="2%"></th>											
											<th width="2%"></th>											
											-->
										</tr>
									</thead>									
									<tbody>	
										<?php
											//Util::debug($documents);										
											foreach ($documents as $document) {
												echo "<tr>";												
												echo "<td><strong>".$document->getCode()."</strong></td>";
												echo "<td>".$document->getDocType()[0]->getName()."</td>";
												echo "<td><strong>".$document->getTitle()."</strong></td>";
												echo "<td>".$document->getVersion()."</td>";																								
												switch ($document->getStatus()) {
													case 0:
														echo "<td><span class='label label-default'>Submetido</span></td>";
														break;
													case 1:
														echo "<td><span class='label label-warning'>Em validação</span></td>";
														break;
													case 2:
														echo "<td><span class='label label-danger'>Devolvido</span></td>";
														break;
													case 3:
														echo "<td><span class='label label-success'>Publicado</span></td>";
														break;
												}
												$date = new DateTime($document->getSubmitionDate());
												echo "<td><strong>".$date->format('d/m/Y')."</strong></td>";
												//echo "<td><a href='".$_SESSION["upload_sub"]."".$document->getFilenameDoc()."'><i class='fas fa-file-word' style='color: blue; font-size: 15pt'></i></a></td>";												
												//echo "<td><i class='fas fa-file-pdf' style='color: red; font-size: 15pt'></i></td>";												
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