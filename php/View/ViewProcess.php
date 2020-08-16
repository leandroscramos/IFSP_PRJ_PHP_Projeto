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

						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Processos</h3>
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
								<?php //Util::debug($processs) ?>
								<table id="tableProcess" class="table table-bordered table-striped">
									<thead>
										<tr>											
											<th width="10%">Sigla</th>
											<th width="40%">Nome</th>
											<th width="29%">Macroprocesso</th>
											<th width="5%">Número</th>																						
											<th width="10%">Status</th>																						
											<th width="3%"></th>																						
											<th width="3%"></th>																						
										</tr>
									</thead>									
									<tbody>										
										<?php											
											foreach ($processs as $process) {
												echo "<tr>";
												echo "<td><strong>".$process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)."</strong></td>";
												echo "<td>".$process->getName()."</td>";												
												echo "<td>".$process->getMacroProcess()[0]->getName()."</td>";												
												echo "<td><strong>".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)."</strong></td>";
												echo "<td>";
												switch ($process->getStatus()) {
													case 'P':
														echo "Publicado";
														break;													
													case 'C':
														echo "Em construção";
														break;
													case 'R':
														echo "Em revisão";
														break;
												}												
												echo "</td>";
										?>
												<td>													
													<button type="button" class="btn btn-sm btn-warning pull-left" data-toggle="modal" data-target="#modalUpdate" 
													style="width: 100%; white-space: normal" onclick="setIdModalUpdate('<?php echo $process->getId();?>','<?php echo $process->getName(); ?>','<?php echo $process->getNumber(); ?>','<?php echo $process->getStatus(); ?>','<?php echo $process->getMacroProcess()[0]->getId(); ?>')">
														<i class="far fa-edit"></i>
													</button>	
												</td>												
												<td>
													<button type="button" class="btn btn-sm btn-danger pull-left" data-toggle="modal" data-target="#modalDelete" 
													style="width: 100%; white-space: normal" onclick="setIdModalDelete(<?php echo $process->getId(); ?>)">
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
						
						<!-- Modal - Cadastro de Processos -->
						<div id="modalCreate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Cadastro | Processos</h4>
									</div>
									<form action="process" method="POST">
										<input type="hidden" name="action" id="action" value="create">
										<div class="modal-body">																	            								            
											
											<div class="row">
												<div class="col-sm-12">
													<label for="processName">Nome</label>
													<input type="text" class="form-control" id="processName" name="processName" placeholder="">
												</div>
											</div>													
											&nbsp;
											<div class="row">
												<div class="col-sm-3">
													<label for="processNumber">Número</label>
													<input type="text" class="form-control" id="processNumber" name="processNumber" placeholder="">
												</div>
												<div class="col-sm-5">
													<label for="processStatus">Status</label>
													<select class="form-control" id="processStatus" name="processStatus">														
														<option selected value="P">Publicado</option>
														<option value="C">Em construção</option>
														<option value="R">Em revisão</option>
													</select>																										
												</div>
											</div>
											&nbsp;
											<div class="row">
												<div class="col-sm-12">
													<label for="id_macroprocess">Macroprocesso</label>					                    
													<select class="form-control" id="id_macroprocess" name="id_macroprocess" >
														<option selected disabled>Selecione</option>															
														<?php
															foreach ($macroProcs as $macroProc) {																	
																echo "<option value=".$macroProc->getId().">[".$macroProc->getMacroProcType()[0]->getInitials()."".str_pad($macroProc->getNumber() , 2 , '0' , STR_PAD_LEFT)."] - ".$macroProc->getName()."</option>";
															}
														?>
													</select>
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
						<!-- Modal - Atualização de Processos -->					
						<div id="modalUpdate" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Atualização | Processos</h4>
									</div>
									<form action="process" method="POST">
										<input type="hidden" name="action" id="action" value="update">
										<input type="hidden" name="processIdModalUpdate" id="processIdModalUpdate">
										<div class="modal-body">																	            								            
											
											<div class="row">
												<div class="col-sm-12">
													<label for="processNameModalUpdate">Nome</label>
													<input type="text" class="form-control" id="processNameModalUpdate" name="processNameModalUpdate" placeholder="">
												</div>
											</div>													
											&nbsp;
											<div class="row">
												<div class="col-sm-3">
													<label for="processNumberModalUpdate">Número</label>
													<input type="text" class="form-control" id="processNumberModalUpdate" name="processNumberModalUpdate" placeholder="">
												</div>
												<div class="col-sm-5">
													<label for="processStatusModalUpdate">Status</label>
													<select class="form-control" id="processStatusModalUpdate" name="processStatusModalUpdate">
														<option value="P" <?php echo $process->getStatus() == 'P' ? 'selected' : '' ?> >Publicado</option>
														<option value="C" <?php echo $process->getStatus() == 'C' ? 'selected' : '' ?> >Em construção</option>
														<option value="R" <?php echo $process->getStatus() == 'R' ? 'selected' : '' ?> >Em revisão</option>														
													</select>																										
												</div>
											</div>
											&nbsp;
											<div class="row">
												<div class="col-sm-12">
													<label for="processIdMacroProcModalUpdate">Macroprocesso</label>					                    
													<select class="form-control" id="processIdMacroProcModalUpdate" name="processIdMacroProcModalUpdate" >
														<option selected disabled>Selecione</option>															
														<?php
															foreach ($macroProcs as $macroProc) {
														?>																		
															<option value="<?php echo $macroProc->getId() ?>" <?php echo $macroProc->getId() == $process->getMacroProcess()[0]->getId() ? 'selected' : ''  ?> > <?php echo "[".$macroProc->getMacroProcType()[0]->getInitials()."".str_pad($macroProc->getNumber() , 2 , '0' , STR_PAD_LEFT)."] - ".$macroProc->getName() ?></option>
																
														<?php
															}
														?>
													</select>
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
						<!-- Modal - Exclusão de Processos -->
						<div id="modalDelete" class="modal fade" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Exclusão | Processos</h4>
									</div>
									<form action="process" method="POST">
									<input type="hidden" name="action" id="action" value="delete">
										<div class="modal-body">
					      					<p>Tem certeza que deseja excluir esse Processo?</p>
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
			$('#tableProcess').DataTable({				
				"lengthMenu": [[10, 20, -1], [10, 20, "Todos"]],
				"order": [[ 2, 'desc' ], [ 3, 'asc' ]]
			});
		});

		function setIdModalDelete(id) {
			document.getElementById('idModalDelete').value = id;
		}

		function setIdModalUpdate(id, name, number, status, id_macroproc) {			
			document.getElementById('processIdModalUpdate').value = id;
			document.getElementById('processNameModalUpdate').value = name;
			document.getElementById('processNumberModalUpdate').value = number;
			document.getElementById('processStatusModalUpdate').value = status;
			document.getElementById('processIdMacroProcModalUpdate').value = id_macroproc;
		}
	</script>
</body>
</html>