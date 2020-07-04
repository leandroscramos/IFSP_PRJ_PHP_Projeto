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
						<div class="box box-warning">
							<div class="box-header">
								<h3 class="box-title">Lista de Documentos submetidos para o Setor de Gestão da Qualidade</h3>
							</div>							
						<!-- /.box-header -->
							<div class="box-body">
								<table id="TabelaDocumentos" class="table table-bordered table-striped">							
									<thead>
										<tr>
											<th width="15%">Código</th>											
											<th width="15%">Tipo do Documento</th>
											<th width="50%">Título do Documento</th>
											<th width="2%">Versão</th>
											<th width="10%">Status</th>
											<th width="2%"></th>											
										</tr>
									</thead>									
									<tbody>	
										<?php
										//Util::debug($documents);
											foreach ($documents as $document) {
												echo "<tr>";												
												echo "<td>".$document->getId()."</td>";
												echo "<td>".$document->getDocType()[0]->getName()."</td>";
												echo "<td><strong>".$document->getTitle()."</strong></td>";
												echo "<td>".$document->getVersion()."</td>";												
												echo "<td><span class='label label-warning'>Aguardando revisão</span></td>";
												echo "<td><span class='glyphicon glyphicon-edit'></td>";
												echo "</tr>";												
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