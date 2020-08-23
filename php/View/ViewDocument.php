<?php
$titulo="Intranet HU";
include "includes/header.php";
include_once $_SESSION["root"].'php/Util/Util.php';
?>

<script src="php/JS/defaultDocument.js"></script>
<?php
	if (($_SESSION["login"]["permissao"] == "Usuário")) {
		if (isset($document)) {
			echo "<script src='php/JS/userDocumentEdit.js'></script>";
		} else {
			echo "<script src='php/JS/userDocument.js'></script>";
		}
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
							<?php Util::debug($document); ?>

							<div class="box-body">
						        <div class="box box-success">
					              <div class="box-header with-border">
					                <h3 class="box-title" align="center">
										<?php 
											if (isset($document)) {
												if ($_SESSION["login"]["permissao"] == "Usuário") {
													echo "Documento submetido";
												} else {
													echo "Atualização de documento";
												}
											} else {
												echo "Novo documento";
											}
										?>
									</h3>
					            	<div class="box-tools pull-right">
										<?php 
											if (isset($document)) {
												echo "Submetido por: <strong><i>".$document->getUserSubmit()."</i></strong>";
											}
										?>
									</div>
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
														<option value="N" <?php echo $document->getTypeSubmit() == 'N' ? 'selected' : '' ?> >Novo Documento</option>
														<option value="R" <?php echo $document->getTypeSubmit() == 'R' ? 'selected' : '' ?> >Revisão de Documento</option>
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
											<div class="col-sm-3">
												<label for="doc_type">Tipo do Documento *</label>
												<input type="hidden" name="doc_id_doctype" id="doc_id_doctype">
												<input type="hidden" name="doc_initials_doctype" id="doc_initials_doctype">

												<select class="form-control" id="doc_type" name="doc_type" onchange="docType()" required>

													<?php
														if (isset($document)) {
															foreach ($doctypes as $doctype) {
													?>
															<option value="<?php echo $doctype->getId()."+".$doctype->getRev()."+".$doctype->getInitials() ?>" <?php echo ($doctype->getId()."+".$doctype->getRev()."+".$doctype->getInitials()) == ($document->getDocType()[0]->getId()."+".$document->getDocType()[0]->getRev()."+".$document->getDocType()[0]->getInitials()) ? 'selected' : '' ?> ><?php echo $doctype->getName() ?></option>

													<?php
															}
														} else {
															echo "<option selected disabled>Selecione</option>";
															foreach ($doctypes as $doctype) {
																echo "<option value='".$doctype->getId()."+".$doctype->getRev()."+".$doctype->getInitials()."'>".$doctype->getName()."</option>";
															} 
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
												<input type="text" class="form-control" id="doc_number" name="doc_number" pattern="[0-9]{3}" maxlength="3" placeholder="Ex: 001" value="<?php echo (isset($document)) ? str_pad($document->getNumber() , 3 , '0' , STR_PAD_LEFT) : "" ?>" required>
											</div>
											<div class="col-sm-1">
												<label for="doc_version">Versão *</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" pattern="[0-9]{2}" maxlength="2" placeholder="Ex: 01" value="<?php echo (isset($document)) ? str_pad($document->getVersion() , 2 , '0' , STR_PAD_LEFT) : "" ?>" required>
											</div>
											<div class="col-sm-2">
												<label for="doc_sigla_area">Área <i>(Sigla)</i> *</label>
												<input type="hidden" name="doc_id_area" id="doc_id_area">
												<input type="hidden" name="doc_initials_area" id="doc_initials_area" value="<?php echo (isset($document)) ? $document->getArea()[0]->getInitials() : "" ?>">
												<select class="form-control" id="doc_sigla_area" name="doc_sigla_area" onchange="areas();" required>
												<?php
													if (isset($document)) {
														foreach ($areas as $area) {
												?>
														<option value="<?php echo $area->getId()."+".$area->getName()."+".$area->getInitials() ?>" <?php echo ($area->getId()."+".$area->getName()."+".$area->getInitials()) == ($document->getArea()[0]->getId()."+".$document->getArea()[0]->getName()."+".$document->getArea()[0]->getInitials()) ? 'selected' : '' ?> ><?php echo $area->getInitials() ?></option>

												<?php
														}
													} else {
														echo "<option selected disabled>Selecione</option>";
														foreach ($areas as $area) {
															echo "<option value='".$area->getId()."+".$area->getName()."+".$area->getInitials()."'>".$area->getInitials()."</option>";
														}
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
												<select class="form-control selectpicker" data-live-search="true" id="doc_process" name="doc_process" onchange="processos()" required>
												<?php
													if (isset($document)) {
														foreach ($processs as $process) {
												?>
														<option value="<?php echo $process->getId()."+".$process->getMacroProcess()[0]->getName()."+".$process->getMacroProcess()[0]->getMacroProcType()[0]->getName()."+".$process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT) ?>" <?php echo ($document->getProcess()[0]->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($document->getProcess()[0]->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($document->getProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$document->getProcess()[0]->getName()) == ($process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$process->getName()) ? 'selected' : '' ?> ><?php echo $process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$process->getName() ?></option>															
												<?php
														}
													} else {
														echo "<option selected disabled>Selecione</option>";
														foreach ($processs as $process) {
															echo "<option value='".$process->getId()."+".$process->getMacroProcess()[0]->getName()."+".$process->getMacroProcess()[0]->getMacroProcType()[0]->getName()."+".$process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)."'>".$process->getMacroProcess()[0]->getMacroProcType()[0]->getInitials()."".str_pad($process->getMacroProcess()[0]->getNumber() , 2 , '0' , STR_PAD_LEFT)."".str_pad($process->getNumber() , 2 , '0' , STR_PAD_LEFT)." - ".$process->getName()."</option>";
														}
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
												<input type="text" class="form-control" id="doc_code" name="doc_code" value="<?php echo (isset($document)) ? $document->getCode() : "" ?>" onkeypress="return false;" required>
												<button type="button" class="btn btn-success col-sm-12" id="btnGeraCodigo" name="btnGeraCodigo" onclick="gerarCodigo()">Gerar código</button>
											</div>
											<div class="col-sm-2" id="situation_div" style="display: none">
												<label for="doc_situation">Situação</label>
												<select class="form-control" id="doc_situation" name="doc_situation" value="<?php echo (isset($document)) ? $document->getSituation() : "" ?>">

													<?php
														if (isset($document)) {
													?>
														<option value="A" <?php echo $document->getSituation() == 'A' ? 'selected' : '' ?> >Ativo</option>
														<option value="I" <?php echo $document->getSituation() == 'I' ? 'selected' : '' ?> >Inativo</option>
													<?php
														} else {
													?>
														<option value="A" selected>Ativo</option>
														<option value="I">Inativo</option>
													<?php
														}
													?>

												</select>
											</div>
											<div class="col-sm-2" id="status_div" style="display: none">
												<label for="status">Status</label>
												<select class="form-control" id="status" name="status" onchange="enableInputFileDocPdf()">

													<?php 
														if (isset($document)) {
													?>
														<option value="0" <?php echo $document->getStatus() == '0' ? 'selected' : '' ?> >Submetido</option>
														<option value="1" <?php echo $document->getStatus() == '1' ? 'selected' : '' ?> >Em validação</option>
														<option value="2" <?php echo $document->getStatus() == '2' ? 'selected' : '' ?> >Devolvido</option>
														<option value="3" <?php echo $document->getStatus() == '3' ? 'selected' : '' ?> >Publicado</option>
													<?php 
														} else {
													?>
														<option value="0">Submetido</option>
														<option value="1">Em validação</option>
														<option value="2">Devolvido</option>
														<option value="3">Publicado</option>
													<?php
														}
													?>

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
											<?php if ((isset($document)) AND (!is_null($document->getFilenameDocFinal()))) { ?>
											<div class="col-sm-2">
												<label for="submit_document">Arquivo DOC Final</label><br>
												<p><a href="<?php echo $_SESSION["upload_pub"]."".$document->getFilenameDocFinal() ?>"><?php echo $document->getFilenameDocFinal() ?></a></p>
											</div>
											<?php }	?>
											<?php if ((isset($document)) AND (!is_null($document->getFilenamePdfFinal()))) { ?>
											<div class="col-sm-2">
												<label for="submit_document">Arquivo PDF Final</label><br>
												<p><a href="<?php echo $_SESSION["upload_pub"]."".$document->getFilenamePdfFinal() ?>" download><?php echo $document->getFilenamePdfFinal() ?></a></p>
											</div>
											<?php }	?>

											<div class="col-sm-3" id="div_doc_sub" <?php echo (isset($document)) ? "style='display: none'" : "" ?>>
												<label for="doc_file_sub">Arquivo</label>
												<input type="file" id="doc_file_sub" name="doc_file_sub" onchange="extensionValidateDocSub(this)" <?php echo (!isset($document)) ? "required" : "" ?> > 
												<div id="file_validate_doc_sub"></div>
											</div>

											<div class="col-sm-3" id="div_doc_final" style="display: none">
												<label for="doc_file_final">Arquivo DOC Final <i class="fas fa-file-word" style="color: blue"></i></label>
												<input type="file" id="doc_file_final" name="doc_file_final" onchange="extensionValidateDocPub(this)" disabled> 
												<div id="file_validate_doc_pub"></div>
											</div>

											<div class="col-sm-3" id="div_pdf_final" style="display: none">
												<label for="pdf_file_final">Arquivo PDF Final <i class="fas fa-file-pdf" style="color: red"></i></label>
												<input type="file" id="pdf_file_final" name="pdf_file_final" onchange="extensionValidatePDF(this)" disabled> 
												<div id="file_validate_pdf_pub"></div>
											</div>
										</div>	

										<div class="box-footer">
											<?php if (isset($document)) { ?>
												<button type="submit" class="btn btn-success pull-right col-sm-1" id="btnSubmit" name="btnSubmit" onclick="return submitUpdateDocument()">Submit</button>
											<?php } else { ?>
												<button type="submit" class="btn btn-success pull-right col-sm-1" id="btnSubmit" name="btnSubmit">Submit</button>
											<?php } ?>
											<button type="reset" class="btn btn-default pull-right col-sm-1" id="btnReset" name="btnReset">Reset</button>
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