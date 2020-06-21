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
								<h3 class="box-title">Setores</h3>
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
								
								<table id="tableSectors" class="table table-bordered table-striped">
									<thead>
										<tr>											
											<!--<th width="3%">Id</th>-->
											<th width="10%">Sigla</th>
											<th width="84%">Nome</th>																						
											<th width="3%"></th>																						
											<th width="3%"></th>																						
										</tr>
									</thead>									
									<tbody>										
										<?php
											foreach ($sectors as $sector) {
												echo "<tr>";												
												//echo "<td>".$sector->getId()."</td>";
												echo "<td><strong>".$sector->getInitials()."</strong></td>";
												echo "<td>".$sector->getName()."</td>";
												
										?>
												<td>													
													<button type="button" class="btn btn-sm btn-warning pull-left" data-toggle="modal" data-target="#modalUpdate" 
													style="width: 100%; white-space: normal" onclick="setIdModalUpdate('<?php echo $sector->getId();?>','<?php echo $sector->getInitials(); ?>','<?php echo $sector->getName(); ?>')">
														<i class="far fa-edit"></i>
													</button>	
												</td>												
												<td>
													<button type="button" class="btn btn-sm btn-danger pull-left" data-toggle="modal" data-target="#modalDelete" 
													style="width: 100%; white-space: normal" onclick="setIdModalDelete(<?php echo $sector->getId(); ?>)">
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
						
						<!-- Modal - Cadastro de Setores -->
						<div id="modalCreate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Cadastro | Setores</h4>
									</div>
									<form action="sector" method="POST">
									<input type="hidden" name="action" id="action" value="create">
										<div class="modal-body">																	            								            
											<div class="row">
												<div class="form-group">					                  
													<div class="col-sm-4">
														<label for="sectorInitials"">Sigla</label>
														<input type="text" class="form-control" id="sectorInitials" name="sectorInitials" placeholder="" pattern="[A-Z]*" maxlength="10" required="required">												
													</div>
													<div class="col-sm-8">
														<label for="sectorName">Nome</label>
														<input type="text" class="form-control" id="sectorName" name="sectorName" placeholder="" required="required">
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
						<!-- Modal - Atualização de Setores -->					
						<div id="modalUpdate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Atualização | Setores</h4>
									</div>
									<form action="sector" method="POST">
									<input type="hidden" name="action" id="action" value="update">
										<div class="modal-body">
											<div class="row">
												<div class="col-sm-4">
													<label for="sectorInitialsUpdate"">Sigla</label>
													<input type="text" class="form-control" id="sectorInitialsUpdate" name="sectorInitialsUpdate" placeholder="" pattern="[A-Z]*" maxlength="10" readonly="true">												
												</div>
												<div class="col-sm-8">
													<label for="sectorNameUpdate">Nome</label>
													<input type="text" class="form-control" id="sectorNameUpdate" name="sectorNameUpdate" placeholder="" required="required">
												</div>
												<div class="col-sm-4">
													<input type="hidden" name="sectorIdModalUpdate" id="sectorIdModalUpdate">
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
						<!-- Modal - Exclusão de Setores -->
						<div id="modalDelete" class="modal fade" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Exclusão | Setores</h4>
									</div>
									<form action="sector" method="POST">
									<input type="hidden" name="action" id="action" value="delete">
										<div class="modal-body">
					      					<p>Tem certeza que deseja excluir esse setor?</p>
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
			$('#tableSectors').DataTable({				
				"lengthMenu": [[10, 20, -1], [10, 20, "Todos"]],
				"order": [[ 1, 'asc' ]]
			});
		});

		function setIdModalDelete(id) {
			document.getElementById('idModalDelete').value = id;
		}

		function setIdModalUpdate(id, initials, name) {			
			document.getElementById('sectorIdModalUpdate').value = id;
			document.getElementById('sectorInitialsUpdate').value = initials;			
			document.getElementById('sectorNameUpdate').value = name;
		}
	</script>
</body>
</html>