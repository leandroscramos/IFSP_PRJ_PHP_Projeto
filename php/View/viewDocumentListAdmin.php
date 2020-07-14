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
											<th></th>											
											<th width="12%">Código</th>											
											<th width="20%">Tipo do Documento</th>
											<th width="40%">Título do Documento</th>
											<th width="4%">Número</th>
											<th width="4%">Versão</th>
											<th width="7%">Status</th>											
											<th width="7%">Submissão</th>
											<th width="1%"></th>																						
										</tr>
									</thead>									
									<tbody>	
										<?php
											//Util::debug($documents);										
											foreach ($documents as $document) {
												echo "<tr>";
												echo ($document->getTypeSubmit() == "N") ? "<td align='center'><small class='label pull-right bg-green' title='Novo Documento'>N</small></td>" : "<td align='center'><strong><small class='label pull-right bg-blue' title='Revisão de Documento'>R</small></td>";												
												echo "<td><strong>".$document->getCode()."</strong></td>";
												echo "<td>".$document->getDocType()[0]->getName()."</td>";
												echo "<td><strong>".$document->getTitle()."</strong></td>";
												echo "<td>".$document->getNumber()."</td>";
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
												$date = new DateTime($document->getSubDate());
												echo "<td><strong>".$date->format('d/m/Y')."</strong></td>";
												echo "<td>";
											?>
												<form action="document" method="post">
													<input type="hidden" name="action" id="action" value="edit">
													<input type="hidden" name="idDocument" id="idDocument" value="<?php echo $document->getId(); ?>">
													<button type="submit" class="btn btn-sm btn-warning pull-left" style="width: 100%; white-space: normal"><i class="far fa-edit"></i></button>
												</form>
											<?php
												echo "</td>";
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