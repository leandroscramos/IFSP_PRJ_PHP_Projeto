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
							<div class="box-header with-border">
								<h3 class="box-title">Formulário para Submissão de Documentos Institucionais</h3>
							</div>

							<div class="box-body">															        
						        <div class="box box-success">
					              <div class="box-header with-border">
					                <h3 class="box-title" align="center">Novo Documento</h3>						            
					            	<div class="box-tools pull-right">
						          </div>

								  <form action="" method="POST">						            								            
									<div class="box-body">
										<div class="form-group">					                  
											<div class="col-sm-6">
												<label for="doc_title"">Título</label>
												<input type="text" class="form-control" id="doc_title" name="doc_title" placeholder="">
											</div>
										</div>
										<div class="form-group">					                  					                  
											<div class="col-sm-3">
												<label for="doc_type">Tipo do Documento</label>					                    
												<select class="form-control" id="doc_type" name="doc_type" >
													<option selected disabled>Selecione</option>
													<option disabled><strong>--- Nível 1 ---</strong></option>
													<option>Cadeia de Valor</option>
													<option>Diretriz</option>
													<option>Manual</option>
													<option>Norma</option>
													<option>Política Institucional</option>
													<option>Programa</option>
													<option>Regimento</option>
													<option>Regulamento</option>
													<option disabled><strong>--- Nível 2 ---</strong></option>
													<option>Fluxograma</option>
													<option>Mapeamento de Processos</option>
													<option>Plano</option>
													<option>Protocolo</option>
													<option disabled><strong>--- Nível 3 ---</strong></option>
													<option>Documentos Externos</option>
													<option>Lista Mestra de Documentos</option>
													<option>Padrão / Rotina</option>
													<option>Procedimento Operacional</option>
													<option>Registro da Qualidade</option>
												</select>
											</div>
											<div class="col-sm-2">
												<label for="doc_codigo">Código</label>
												<input type="text" class="form-control" id="doc_codigo" name="doc_codigo" placeholder="" disabled>
											</div>
											<div class="col-sm-1">
												<label for="doc_setor">Setor</label>												
												<select class="form-control" id="doc_nome_setor" name="doc_nome_setor">
													<option selected disabled>-</option>
													<option>GAS</option>
													<option>GEP</option>
													<option>GA</option>
													<option>SGPTI</option>													
												</select>
											</div>
											<div class="col-sm-4">
												<label for="doc_setor">Nome do Setor</label>					                    
												<input type="text" class="form-control" id="doc_setor" name="doc_setor" placeholder="" disabled>
											</div>					                  
											<div class="col-sm-2">
												<label for="doc_proc_type">Processo/Tipo</label>
												<input type="text" class="form-control" id="doc_proc_type" name="doc_proc_type" placeholder="" disabled>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-6">
												<label for="doc_proc_name">Nome do Processo</label>
												<input type="text" class="form-control" id="doc_proc_type" name="doc_proc_type" placeholder="" >
											</div>
											<div class="col-sm-1">
												<label for="doc_number">Numero</label>
												<input type="text" class="form-control" id="doc_number" name="doc_number" placeholder="">
											</div>
											<div class="col-sm-1">
												<label for="doc_version">Versão</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" placeholder="">
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-3">
												<label for="doc_version">Elaborado por</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" placeholder="">
											</div>
											<div class="col-sm-3">
												<label for="doc_version">Revisado por</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" placeholder="">
											</div>
											<div class="col-sm-3">
												<label for="doc_version">Validado por</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" placeholder="">
											</div>
											<div class="col-sm-3">
												<label for="doc_version">Aprovado por</label>
												<input type="text" class="form-control" id="doc_version" name="doc_version" placeholder="">
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-2">
												<label for="doc_validate">Data aprovação</label>
												<input type="date" class="form-control" id="doc_validate" name="doc_validate" placeholder="">
											</div>
											<div class="col-sm-2">
												<label for="doc_author">Validade</label>
												<input type="text" class="form-control" id="doc_author" name="doc_author" placeholder="" disabled>
											</div>
											<div class="col-sm-2">
												<label for="doc_validate">Próxima revisão</label>
												<input type="text" class="form-control" id="doc_validate" name="doc_validate" placeholder="" disabled>
											</div>											
										</div>

										<div class="form-group">
											<div class="col-sm-2">
												<label for="doc_validate">Processo SEI</label>
												<input type="text" class="form-control" id="doc_validate" name="doc_validate" placeholder="">
											</div>
											<div class="col-sm-2">
												<label for="doc_validate">Documento</label>
												<input type="text" class="form-control" id="doc_validate" name="doc_validate" placeholder="">
											</div>
											<div class="col-sm-2">
												<label for="doc_validate">Despacho SEI</label>
												<input type="text" class="form-control" id="doc_validate" name="doc_validate" placeholder="">
											</div>										
											<div class="col-sm-1">
												<label for="doc_validate">Situação</label>
												<select class="form-control" id="doc_nome_setor" name="doc_nome_setor">
													<option selected disabled>-</option>
													<option>Ativo</option>
													<option>Inativo</option>																										
												</select>
											</div>
											<div class="col-sm-3">
												<label for="doc_validate">Alterações</label>
												<select class="form-control" id="doc_nome_setor" name="doc_nome_setor">
													<option selected disabled>-</option>
													<option>Criação de Documento</option>
													<option>Elaboração de Documento</option>
													<option>Institucionalização de Documento</option>
												</select>
											</div>
											<div class="col-sm-2">
												<label for="doc_validate">Status</label>
												<select class="form-control" id="doc_nome_setor" name="doc_nome_setor">
													<option selected disabled>-</option>
													<option>Publicado</option>
													<option>Coletando assinaturas</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-3">
												<label for="exampleInputFile" >Arquivo</label>
												<input type="file" id="exampleInputFile" value="Buscar">										
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
</body>
</html>