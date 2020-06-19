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
								<h3 class="box-title">Macroprocessos</h3>
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
								
								<table id="tableProcTypes" class="table table-bordered table-striped">
									<thead>
										<tr>											
											<th width="10%">Sigla</th>
											<th width="50%">Nome</th>
											<th width="29%">Tipo de Processo</th>
											<th width="5%">Número</th>																						
											<th width="3%"></th>																						
											<th width="3%"></th>																						
										</tr>
									</thead>									
									<tbody>										
										<?php											
											foreach ($macroProcs as $macroProc) {
												echo "<tr>";
												//Util::debug($macroProc);												
												echo "<td><strong>".$macroProc->getMacroProcType()[0]->getInitials()."".str_pad($macroProc->getNumber() , 2 , '0' , STR_PAD_LEFT)."</strong></td>";
												echo "<td>".$macroProc->getName()."</td>";												
												echo "<td>".$macroProc->getMacroProcType()[0]->getName()."</td>";
												echo "<td><strong>".str_pad($macroProc->getNumber() , 2 , '0' , STR_PAD_LEFT)."</strong></td>";												
										?>
												<td>													
													<button type="button" class="btn btn-sm btn-warning pull-left" data-toggle="modal" data-target="#modalUpdate" 
													style="width: 100%; white-space: normal" onclick="setIdModalUpdate('<?php echo $macroProc->getId();?>','<?php echo $macroProc->getName(); ?>',,'<?php echo $macroProc->getIdProcType(); ?>''<?php echo $macroProc->getNumber(); ?>')">
														<i class="far fa-edit"></i>
													</button>	
												</td>												
												<td>
													<button type="button" class="btn btn-sm btn-danger pull-left" data-toggle="modal" data-target="#modalDelete" 
													style="width: 100%; white-space: normal" onclick="setIdModalDelete(<?php echo $macroProc->getId(); ?>)">
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
							
<<<<<<< HEAD
						</div>
						<?php //Util::debug($procTypes); ?>
=======
						</div>						
>>>>>>> e1bfedd45ccc9151a3e52aba8c9b49cace675261
						<!-- Modal - Cadastro de Tipos de Macroprocessos -->
						<div id="modalCreate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Cadastro | Macroprocessos</h4>
									</div>
									<form action="macroProc" method="POST">
									<input type="hidden" name="action" id="action" value="create">
										<div class="modal-body">																	            								            
											<div class="row">
												<div class="form-group">													
													<div class="col-sm-8">
														<label for="procTypeName">Nome</label>
														<input type="text" class="form-control" id="procTypeName" name="procTypeName" placeholder="">
													</div>
													<div class="col-sm-4">
														<label for="procTypeNumber"">Número</label>
														<input type="text" class="form-control" id="procTypeNumber" name="procTypeNumber" placeholder="">												
													</div>
													&nbsp;
													<div class="col-sm-12">
														<label for="id_macro_proc">Tipo de Processo</label>					                    
														<select class="form-control" id="id_macro_proc" name="id_macro_proc" >
															<option selected disabled>Selecione</option>															
															<?php
															foreach ($procTypes as $procType) {
																echo "<option value=".$procType->getId().">".$procType->getName()."</option>";
															}
															?>
														</select>
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
						<!-- Modal - Atualização de Tipos de Macroprocessos -->					
						<div id="modalUpdate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Atualização | Macroprocessos</h4>
									</div>
									<form action="procType" method="POST">
									<input type="hidden" name="action" id="action" value="update">
										<div class="modal-body">
											<div class="row">
												<div class="col-sm-4">
													<label for="procTypeInitialsUpdate"">Sigla</label>
													<input type="text" class="form-control" id="procTypeInitialsUpdate" name="procTypeInitialsUpdate" placeholder="">												
												</div>
												<div class="col-sm-8">
													<label for="procTypeNameUpdate">Nome</label>
													<input type="text" class="form-control" id="procTypeNameUpdate" name="procTypeNameUpdate" placeholder="">
												</div>
												<div class="col-sm-4">
													<input type="hidden" name="procTypeIdModalUpdate" id="procTypeIdModalUpdate">
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
						<!-- Modal - Exclusão de Tipos de Macroprocessos -->
						<div id="modalDelete" class="modal fade" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Exclusão | Macroprocessos</h4>
									</div>
									<form action="procType" method="POST">
									<input type="hidden" name="action" id="action" value="delete">
										<div class="modal-body">
					      					<p>Tem certeza que deseja excluir esse Tipo de Macroprocessos?</p>
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
			$('#tableProcTypes').DataTable({				
				"lengthMenu": [[10, 20, -1], [10, 20, "Todos"]],
				"order": [[ 2, 'desc' ], [ 3, 'asc' ]]
			});
		});

		function setIdModalDelete(id) {
			document.getElementById('idModalDelete').value = id;
		}

		function setIdModalUpdate(id, initials, name) {			
			document.getElementById('procTypeIdModalUpdate').value = id;
			document.getElementById('procTypeInitialsUpdate').value = initials;			
			document.getElementById('procTypeNameUpdate').value = name;
		}
	</script>
</body>
</html>