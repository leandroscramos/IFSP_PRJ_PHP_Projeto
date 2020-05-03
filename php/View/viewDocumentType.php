<?php 
$titulo=$_SESSION["title"];
include "includes/header.php";
include_once $_SESSION["root"].'php/Util/Util.php';
?>

<?php include "includes/menu.php";?>

	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-md-10 col-md-offset-1">

						<div class="box box-warning">
							<div class="box-header with-border">
								<h3 class="box-title">Tipos de Documentos</h3>
							</div>
							
							<div class="box-header">
								<?php 
									if (isset($_SESSION["flash"]["msg"])) {
										if (($_SESSION["flash"]["sucesso"]) == true) {
											echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
											echo "<i class='far fa-check-circle'></i>&nbsp;&nbsp;".$_SESSION["flash"]["msg"];
											echo "</div>";
										} else {
											echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
											echo "<i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;".$_SESSION["flash"]["msg"];
											echo "</div>";																			
										}
									}
								?>
								
								<button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modalCreate" style="width: 12%; white-space: normal">
									Novo
								</button>
							</div>
							<div class="box-body">
								
								<table id="tableDocTypes" class="table table-bordered table-striped">
									<thead>
										<tr>
											<!--<th width="3%">Id</th>-->
											<th width="10%">Sigla</th>											
											<th width="74%">Nome</th>																
											<th width="10%">Nível</th>																						
											<th width="3%"></th>																						
											<th width="3%"></th>																						
										</tr>
									</thead>									
									<tbody>										
										<?php
											foreach ($doctypes as $doctype) {
												echo "<tr>";
												//echo "<td>".$doctype->getId()."</td>";
												echo "<td><strong>".$doctype->getInitials()."</strong></td>";
												echo "<td>".$doctype->getName()."</td>";
												echo "<td><strong>".$doctype->getLevel()."</strong></td>";
										?>
												<td>													
													<button type="button" class="btn btn-sm btn-warning pull-left" data-toggle="modal" data-target="#modalUpdate" 
													style="width: 100%; white-space: normal" onclick="setIdModalUpdate('<?php echo $doctype->getId();?>','<?php echo $doctype->getName(); ?>','<?php echo $doctype->getInitials(); ?>','<?php echo $doctype->getLevel(); ?>')">
														<i class="far fa-edit"></i>
													</button>	
												</td>												
												<td>
													<button type="button" class="btn btn-sm btn-danger pull-left" data-toggle="modal" data-target="#modalDelete" 
													style="width: 100%; white-space: normal" onclick="setIdModalDelete(<?php echo $doctype->getId(); ?>)">
														<i class="far fa-trash-alt"></i>
													</button>
												</td>
										<?php		
												echo "</tr>";
											}
										?>
									</tbody>
								</table>
							</div>							
						</div>
						
						<!-- Modal - Cadastro de Tipos de Documento -->
						<div id="modalCreate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Cadastro | Tipo de Documento</h4>
									</div>
									<form action="docType" method="POST">
									<input type="hidden" name="action" id="action" value="create">
										<div class="modal-body">																	            								            
											<div class="row">
												<div class="form-group">					                  
													<div class="col-sm-6">
														<label for="docTypeTitle"">Tipo do documento</label>
														<input type="text" class="form-control" id="docTypeTitle" name="docTypeTitle" placeholder="">												
													</div>
													<div class="col-sm-4">
														<label for="docTypeInitials"">Sigla do documento</label>
														<input type="text" class="form-control" id="docTypeInitials" name="docTypeInitials" placeholder="">												
													</div>
													<div class="col-sm-2">
														<label for="docTypeLevel">Nível</label>
														<input type="number" class="form-control" id="docTypeLevel" name="docTypeLevel" min="1" max="3" placeholder="">
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 20%; white-space: normal">Fechar</button>
											<button type="reset" class="btn btn-danger" style="width: 20%; white-space: normal">Limpar</button>
											<button type="submit" class="btn btn-success" style="width: 20%; white-space: normal">Salvar</button>
										</div>
									</form>
								</div>								
							</div>							
						</div>
						<!-- Modal - Atualização de Tipos de Documento -->					
						<div id="modalUpdate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Atualização | Tipo de Documento</h4>
									</div>
									<form action="docType" method="POST">
										<input type="hidden" name="action" id="action" value="update">
										<input type="hidden" name="docTypeIdModalUpdate" id="docTypeIdModalUpdate">
										<!--<input type="hidden" name="docTypeTitleUpdate" id="docTypeTitleUpdate">
										<input type="hidden" name="docTypeInitialsUpdate" id="docTypeInitialsUpdate">
										<input type="hidden" name="docTypeLevelUpdate" id="docTypeLevelUpdate">-->
									
										<div class="modal-body">
											<div class="row">
												<div class="col-sm-6">
													<label for="docTypeTitle"">Tipo do documento</label>
													<input type="text" class="form-control" id="docTypeTitleUpdate" name="docTypeTitleUpdate" placeholder="">												
												</div>
												<div class="col-sm-4">
														<label for="docTypeInitialsUpdate"">Sigla do documento</label>
														<input type="text" class="form-control" id="docTypeInitialsUpdate" name="docTypeInitialsUpdate" placeholder="">												
													</div>
												<div class="col-sm-2">
													<label for="docTypeLevel">Nível</label>
													<input type="number" class="form-control" id="docTypeLevelUpdate" name="docTypeLevelUpdate" min="1" max="3" placeholder="">
												</div>												
											</div>											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 20%; white-space: normal">Fechar</button>
											<button type="reset" class="btn btn-danger" style="width: 20%; white-space: normal">Limpar</button>
											<button type="submit" class="btn btn-success" style="width: 20%; white-space: normal">Salvar</button>
										</div>
									</form>
								</div>								
							</div>							
						</div>
						<!-- Modal - Exclusão de Tipos de Documento -->
						<div id="modalDelete" class="modal fade" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Exclusão | Tipo de Documento</h4>
									</div>
									<form action="docType" method="POST">
									<input type="hidden" name="action" id="action" value="delete">
										<div class="modal-body">
					      					<p>Tem certeza que deseja excluir esse tipo de documento?</p>
											<input type="hidden" name="idModalDelete" id="idModalDelete">
										</div>
										<div class="modal-footer">											
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 24%; white-space: normal">Fechar</button>											
											<button type="submit" class="btn btn-success" style="width: 24%; white-space: normal">Excluir</button>
										</div>
									</form>
								</div>								
							</div>							
						</div>
					</div>
				</div>
			</section>
		</div>		
	</div>
	<!-- /.content-wrapper -->

	<?php include $_SESSION["root"].'includes/footer.php'; ?>	
	
	<script>
		$(function () {  	
			$('#tableDocTypes').DataTable({				
				"lengthMenu": [[10, -1], [10, "Todos"]],
				"order": [[ 1, 'asc' ]]
			});
		});
		
		function setIdModalDelete(id) {
			document.getElementById('idModalDelete').value = id;
		}

		function setIdModalUpdate(id, name, initials, level) {			
			document.getElementById('docTypeIdModalUpdate').value = id;
			document.getElementById('docTypeTitleUpdate').value = name;			
			document.getElementById('docTypeInitialsUpdate').value = initials;
			document.getElementById('docTypeLevelUpdate').value = level;			
		}
	</script>
</body>
</html>