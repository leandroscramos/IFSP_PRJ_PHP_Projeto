<?php 
$titulo="Intranet HU";
include "includes/header.php";
include_once $_SESSION["root"].'php/Util/Util.php';
?>

<script src="php/JS/defaultDocument.js"></script>
<?php 
	if (($_SESSION["login"]["permissao"] == "Usuário")) {
		echo "<script src='php/JS/userDocument.js'></script>";
	} else {
		echo "<script src='php/JS/adminDocument.js'></script>";
	}
?>


<script type="text/javascript">
	window.onload = function() {
		readOnly();
	}
</script>

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
							<div class="box-header with-border">
								<h3 class="box-title">Formulário para Submissão de Documentos Institucionais</h3>								
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
							</div>
							<?php //Util::debug($document); ?>
							<div class="box-body">															        
						        <div class="box box-success">
					              <div class="box-header with-border">
					                <h3 class="box-title" align="center">Novo Documento</h3>						            
					            	<div class="box-tools pull-right">
						          </div>								  
								  <form action="document" method="POST" enctype="multipart/form-data">
									<?php 
										if (!isset($document)) {
											echo "<input type='hidden' name='action' id='action' value='create'>";
										} else {
											echo "<input type='hidden' name='action' id='action' value='update'>";
										}
									?>									
									<div class="box-body">
									<input type="hidden" name="id_document" id="id_document" value="<?php echo (isset($document)) ? $document->getId() : "" ?>">
										<div class="form-group">					                  
											<div class="col-sm-7">
												<label for="doc_title"">Título *</label>
												<input type="text" class="form-control" id="doc_title" name="doc_title" value="<?php echo (isset($document)) ? $document->getTitle() : "" ?>" required>
											</div>
											<div class="col-sm-3">
												<label for="type_submit">Submissão *</label>
												<select class="form-control" id="type_submit" name="type_submit" required>
													
													<?php 
														if (isset($document)) {																														
													?>
														<option value="N" <?php echo $document->getTypeSubmit() == 'N' ? 'selected' : '';?> >Novo Documento</option>
														<option value="R" <?php echo $document->getTypeSubmit() == 'R' ? 'selected' : '';?> >Revisão de Documento</option>
													<?php 
														} else {
													?>
														<option selected disabled>Selecione</option>
														<option value="N">Novo Documento</option>
														<option value="R">Revisão de Documento</option>
													<?php
														}
													?>
																									
												</select>
											</div>											
											<div class="col-sm-2">
												<label for="doc_approval_date">Data aprovação *</label>
												<input type="date" class="form-control" id="doc_approval_date" name="doc_approval_date" placeholder="" value="<?php echo (isset($document)) ? date("Y-m-d", strtotime($document->getApprovalDate())) : "" ?>" required>
											</div>																																											
										</div>										
										<div class="form-group">																						
											<div class="col-sm-4">
												<label for="doc_type">Tipo do Documento *</label>
												<input type="hidden" name="doc_id_doctype" id="doc_id_doctype">							                    
												<input type="hidden" name="doc_initials_doctype" id="doc_initials_doctype" value="<?php echo (isset($document)) ? $document->getDocType()[0]->getInitials() : "" ?>">												
												<select class="form-control" id="doc_type" name="doc_type" onchange="docType()" required>
                                                    <option selected><?php echo (isset($document)) ? $document->getDocType()[0]->getName() : "Selecione" ?></option>
                                                    <option disabled><strong>--- Nível 1 ---</strong></option>
                                                    <?php													
                                                    foreach ($doctypes as $doctype) {
                                                        if ($doctype->getLevel() == 1)
                                                            echo "<option value='".$doctype->getId()."+".$doctype->getRev()."+".$doctype->getInitials()."'>".$doctype->getName()."</option>";
                                                    }
                                                    ?>
                                                    <option disabled><strong>--- Nível 2 ---</strong></option>
                                                    <?php
                                                    foreach ($doctypes as $doctype) {
                                                        if ($doctype->getLevel() == 2)
                                                            echo "<option value='".$doctype->getId()."+".$doctype->getRev()."+".$doctype->getInitials()."'>".$doctype->getName()."</option>";
                                                    }
                                                    ?>
                                                    <option disabled><strong>--- Nível 3 ---</strong></option>
                                                    <?php
                                                    foreach ($doctypes as $doctype) {
                                                        if ($doctype->getLevel() == 3)
                                                            echo "<option value='".$doctype->getId()."+".$doctype->getRev()."+".$doctype->getInitials()."'>".$doctype->getName()."</option>";
													}
													?>													

												</select>
											</div>
											<div class="col-sm-1">
												<label for="doc_validate">Validade</label>
												<input type="text" class="form-control" id="doc_validate" name="doc_validate" placeholder="" value="<?php echo (!isset($document)) ? "" : ($document->getDocType()[0]->getRev() == "NA" ? "NA" : $document->getDocType()[0]->getRev()." anos") ?>">
											</div>
											<div class="col-sm-1">
												<label for="doc_number">Número *</label>
												<input type="text" class="form-control" id="doc_number" name="doc_number" pattern="[0-9]{3}" maxlength="3" placeholder="" value="<?php echo (isset($document)) ? str_pad($document->getNumber() , 3 , '0' , STR_PAD_LEFT) : "" ?>" required>
											</div>
											<div class="col-sm-1">
												<label for="doc_version">Versão *</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" pattern="[0-9]{2}" maxlength="2" placeholder="" value="<?php echo (isset($document)) ? str_pad($document->getVersion() , 2 , '0' , STR_PAD_LEFT) : "" ?>" required>
											</div>
											<div class="col-sm-1">
												<label for="doc_sigla_area">Área <i>(Sigla)</i> *</label>
												<input type="hidden" name="doc_id_area" id="doc_id_area">
												<input type="hidden" name="doc_initials_area" id="doc_initials_area" value="<?php echo (isset($document)) ? $document->getArea()[0]->getInitials() : "" ?>">
												<select class="form-control" id="doc_sigla_area" name="doc_sigla_area" onchange="areas();" required>
													<option selected><?php echo (isset($document)) ? $document->getArea()[0]->getInitials() : "Selecione" ?></option>                                                    
                                                    <?php
                                                    foreach ($areas as $area) {
														echo "<option value='".$area->getId()."+".$area->getName()."+".$area->getInitials()."'>".$area->getInitials()."</option>";														
                                                    }
                                                    ?>													
												</select>
											</div>
											<div class="col-sm-4">
												<label for="doc_area">Área <i>(Nome)</i></label>					                    
												<input type="text" class="form-control" id="doc_area" name="doc_area" placeholder="" value="<?php echo (isset($document)) ? $document->getArea()[0]->getName() : "" ?>" readonly="true">
											</div>	
										</div>
										<div class="form-group">
											<div class="col-sm-3">
												<label for="doc_maker">Elaborado por *</label>
												<input type="text" class="form-control" id="doc_maker" name="doc_maker" value="<?php echo (isset($document)) ? $document->getMaker() : "" ?>" required>
											</div>
											<div class="col-sm-3">
												<label for="doc_reviewer">Revisado por *</label>
												<input type="text" class="form-control" id="doc_reviewer" name="doc_reviewer" value="<?php echo (isset($document)) ? $document->getReviewer() : "" ?>" required>
											</div>											
											<div class="col-sm-3">
												<label for="doc_approver">Aprovado por *</label>
												<input type="text" class="form-control" id="doc_approver" name="doc_approver" value="<?php echo (isset($document)) ? $document->getApprover() : "" ?>" required>
											</div>
											<div class="col-sm-3">
												<label for="doc_validator">Validado por *</label>
												<input type="text" class="form-control" id="doc_validator" name="doc_validator" value="<?php echo (isset($document)) ? $document->getValidator() : "" ?>" required>
											</div>
										</div>										
										<hr>
										<div class="form-group">
											<div class="col-sm-6">
												<label for="doc_process">Processo *</label>
												<input type="hidden" name="doc_id_process" id="doc_id_process">
												<input type="hidden" name="doc_initials_process" id="doc_initials_process" value="<?php echo (isset($document)) ? $document->getProcess()[0]->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($document->getProcess()[0]->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($document->getProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT) : "" ?>">
												<select class="form-control" id="doc_process" name="doc_process" onchange="processos()" required>
													<option selected><?php echo (isset($document)) ? $document->getProcess()[0]->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($document->getProcess()[0]->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($document->getProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$document->getProcess()[0]->getName() : "Selecione" ?></option>
													
                                                    <?php
                                                    foreach ($processs as $process) {
                                                        echo "<option value='".$process->getId()."+".$process->getMacroProcess()[0]->getName()."+".$process->getMacroProcess()[0]->getMacroProcType()[0]->getName()."+".$process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)."'>".$process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$process->getName()."</option>";
                                                    }
                                                    ?>													
												</select>
											</div>
											<div class="col-sm-3">
												<label for="doc_macroproc">Macroprocesso</label>
												<input type="text" class="form-control" id="doc_macroproc" name="doc_macroproc" placeholder="" value="<?php echo (isset($document)) ? $document->getProcess()[0]->getMacroProcess()[0]->getName() : "" ?>">
											</div>
											<div class="col-sm-3">
												<label for="doc_proc_type">Tipo do Processo</label>
												<input type="text" class="form-control" id="doc_proc_type" name="doc_proc_type" placeholder="" value="<?php echo (isset($document)) ? $document->getProcess()[0]->getMacroProcess()[0]->getMacroProcType()[0]->getName() : "" ?>">
											</div>											
										</div>
										<hr>
										<div class="form-group">
											<div class="col-sm-2">
												<label for="process_sei">Processo SEI</label>
												<input type="text" class="form-control" id="process_sei" name="process_sei" placeholder="" value="<?php echo (isset($document)) ? $document->getProcessSei() : "" ?>">
											</div>
											<div class="col-sm-2">
												<label for="document_sei">Documento SEI</label>
												<input type="text" class="form-control" id="document_sei" name="document_sei" placeholder="" value="<?php echo (isset($document)) ? $document->getDocSei() : "" ?>">
											</div>
											<div class="col-sm-2">
												<label for="dispatch_sei">Despacho SEI</label>
												<input type="text" class="form-control" id="dispatch_sei" name="dispatch_sei" placeholder="" value="<?php echo (isset($document)) ? $document->getDispatchSei() : "" ?>">
											</div>	
										</div>
										<hr>										
										
										<div class="form-group">
											<div class="col-sm-2">
												<label for="doc_code">Código do documento *</label>
												<input type="text" class="form-control" id="doc_code" name="doc_code" value="<?php echo (isset($document)) ? $document->getCode() : "" ?>" readonly="true" required>
												<button type="button" class="btn btn-success col-sm-12" name="submitInternacao" onclick="gerarCodigo()">Gerar código</button>												
											</div>
											<div class="col-sm-2" id="situation_div" style="display: none">
												<label for="doc_situation">Situação</label>
												<select class="form-control" id="doc_situation" name="doc_situation" value="<?php echo (isset($document)) ? $document->getSituation() : "" ?>">													
													<?php 
														if (isset($document)) {
															if ($document->getSituation() == "A")
																echo "<option selected value='".$document->getSituation()."'>Ativo</option>";																															
															if ($document->getSituation() == "I")
																echo "<option selected value='".$document->getSituation()."'>Inativo</option>";																				
														}
													?>	
													<option value="A">Ativo</option>
													<option value="I">Inativo</option>																										
												</select>
											</div>
											<div class="col-sm-2" id="status_div" style="display: none">
												<label for="status">Status</label>
												<select class="form-control" id="status" name="status">
													<?php 
														if (isset($document)) {
															if ($document->getStatus() == "0")
																echo "<option selected value='".$document->getStatus()."'>Submetido</option>";																															
															if ($document->getStatus() == "1")
																echo "<option selected value='".$document->getStatus()."'>Em validação</option>";			
															if ($document->getStatus() == "2")
																echo "<option selected value='".$document->getStatus()."'>Devolvido</option>";			
															if ($document->getStatus() == "3")
																echo "<option selected value='".$document->getStatus()."'>Publicado</option>";			
														}
													?>													
													<option value="0">Submetido</option>
													<option value="1">Em validação</option>																										
													<option value="2">Devolvido</option>																										
													<option value="3">Publicado</option>																										
												</select>
											</div>									
										</div>
										
										<hr>
										
										<div class="form-group">
											
											<?php if (isset($document)) { ?>
											<div class="col-sm-2">
												<label for="submit_document">Arquivo Submetido</label><br>													
												<p><a href="<?php echo $_SESSION["upload_sub"]."".$document->getFilenameDoc() ?>"><?php echo $document->getFilenameDoc() ?></a></p>
											</div>											
											<?php }	?>
										
											<div class="col-sm-3">
												<label for="doc_file">Arquivo</label>
												<input type="file" id="doc_file" name="doc_file" onchange="extensionValidate(this)"> 
												<div id="file_validate"></div>																						
											</div>
											
											<div class="col-sm-3" id="div_doc_final" style="display: none">
												<label for="doc_file2">Arquivo DOC Final <i class="fas fa-file-word" style="color: blue"></i></label>
												<input type="file" id="doc_file2" name="doc_file2" onchange="extensionValidate(this)" > 
												<div id="file_validate"></div>																						
											</div>

											<div class="col-sm-3" id="div_pdf_final" style="display: none">
												<label for="doc_file3">Arquivo PDF Final <i class="fas fa-file-pdf" style="color: red"></i></label>
												<input type="file" id="doc_file3" name="doc_file3" onchange="extensionValidate(this)" > 
												<div id="file_validate"></div>																						
											</div>
										</div>	

										<div class="box-footer">				                
											<button type="submit" class="btn btn-success pull-right col-sm-1" name="submitInternacao">Submit</button>
											<button type="reset" class="btn btn-default pull-right col-sm-1">Reset</button>
										</div>					                
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
	
</body>
</html>