<?php 
$titulo="Intranet | HU UFSCar";
include $_SESSION["root"].'includes/header.php';
?>

	<?php include $_SESSION["root"].'includes/menu.php';?>
	
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->

			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-md-12">
						<div class="box box-aqua">
							<div class="box-header with-border">
								<h3 class="box-title">Extração de dados dos sistemas HU-UFSCar</h3>
							</div>
							<div class="box-body">
								<form class="form-horizontal" action="stats_csv" method="POST" target="_blank">

									<div class="col-md-4 col-md-offset-4">
										<div class="col-md-12">
											<div class="form-group">
												<label for="lista">Dados</label>
												<select class="form-control" id="lista" name="lista" width="100%" required autofocus>
													<option selected disabled>Selecione</option>
													<?php
														$array_permissoes = array('1','21'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='classificacao_risco.txt' title='Lista de classificações de risco realizadas no período, contendo datas, grau de risco, idade do paciente, sexo e bairro'>Classificação de risco</option>" : "";

//														$array_permissoes = array('1','40');
//														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_consultas_ambulatorio_consolidado.txt' title='Lista de consultas ambulatoriais agrupadas por profissional com os totais de consultas agendadas, realizadas e faltas'>Consultas ambulatoriais (consolidado)</option>" : "";
														$array_permissoes = array('1','40');
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_consultas_ambulatorio_pa_consolidado.txt' title='Lista de consultas ambulatoriais e de pronto atendimento agrupadas por especialidade com os totais de consultas agendadas, realizadas e faltas'>Consultas ambulatoriais e de pronto atendimento (consolidado)</option>" : "";

														$array_permissoes = array('1','43'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_consultas_ambulatorio_faturamento.txt' title='Lista de consultas ambulatoriais com dados para faturamento BPA'>Consultas ambulatoriais (faturamento)</option>" : "";

														$array_permissoes = array('1','22'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_consultas_multi_individualizado.txt' title= 'Lista de consultas multiprofissionais realizadas no período, contendo data da consulta, especialidade, prontuario, nome do paciente e situação final da consulta'>Consultas multiprofissionais (individualizado)</option>" : "";

														$array_permissoes = array('1','41'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_consultas_multi_consolidado.txt' title= 'Números totais de consultas multiprofissionais realizadas no período por especialidade'>Consultas multiprofissionais (consolidado)</option>" : "";

														$array_permissoes = array('1','23'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_materiais_movimentos_comp.txt' title='Movimentação de materiais'>Consumo/movimentação de materiais por competência</option>" : "";
														
														$array_permissoes = array('1','23'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_materiais_consumo_comp.txt' title='Consumo de materiais agrupados por competência (apenas dos Almoxarifados Produtos para Saúde e Nutrição)'>Consumo (saídas) de materiais por competência</option>" : "";

														$array_permissoes = array('1','24'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='exames_laboratoriais_consolidado.txt' title='Números totais de requisições e exames laboratoriais feitos no período por unidade funcional agrupados por mês'>Exames laboratoriais - dados gerais</option>" : "";

														$array_permissoes = array('1','24'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='exames_laboratoriais.txt' title='Lista de exames laboratoriais solicitados no período por unidade funcional'>Exames laboratoriais - lista</option>" : "";

														$array_permissoes = array('1','36'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_internacoes_extrato.txt' title='Lista de internações no período por unidade funcional (somente pacientes com alta médica).'>Internações - extrato</option>" : "";

														$array_permissoes = array('1','29'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_internacoes_consolidado.txt' title='Números totais de internações no período por unidade funcional'>Internações - dados gerais</option>" : "";

														$array_permissoes = array('1','37'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_paciente_dia.txt' title='Pacientes-dia no período por unidade funcional e por clínica, incluindo as saídas'>Internações - pacientes-dia e saídas</option>" : "";

														$array_permissoes = array('1','36'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_pacientes_cuidados_paliativos.txt' title='Pacientes em cuidados paliativos no período (por data de internação)'>Internações - pacientes em cuidados paliativos</option>" : "";

														$array_permissoes = array('1','33'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_estoque_almox.txt' title='Lista de medicamentos e respectivo estoque nos almoxarifados'>Estoque de medicamentos</option>" : "";

														$array_permissoes = array('1','38'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_prescricoes_farmacia.txt' title='Consumo de medicamentos, antibióticos e médias de consumo em prescrições médicas'>Estatísticas de prescrições médicas</option>" : "";

														$array_permissoes = array('1','38'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_prescricoes_atb_geral.txt' title='Consumo geral de antibióticos em prescrições médicas'>Estatísticas de prescrições de antibióticos - geral</option>" : "";

														$array_permissoes = array('1','38'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_prescricoes_atb_unf.txt' title='Consumo de antibióticos em prescrições médicas por Unidade Funcional'>Estatísticas de prescrições de antibióticos - por unidade funcional</option>" : "";

														$array_permissoes = array('1','38'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_far_estornos_dispensacao.txt' title='Número de estornos de dispensação totalizados por motivo de devolução no período'>Número de estornos de dispensação totalizados por motivo de devolução</option>" : "";

														$array_permissoes = array('1','39'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_evolucoes_nutricao_indicadores.txt' title='Atendimentos de nutrição clínica realizados, apresenta tipos de dieta, orientação, tempo de resposta e nível assistencial'>Atendimentos de nutrição clínica</option>" : "";

														$array_permissoes = array('1','46'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='aghu_evolucoes_nutricao_passagem_plantao.txt' title='Dados de atendimentos de nutrição clínica realizados para passagem de plantão'>Atendimentos de nutrição clínica - passagem de plantão</option>" : "";

														$array_permissoes = array('1','42'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='agravos.txt' title='Lista de pacientes atendidos com registro de agravos'>Atendimentos com registro de agravos</option>" : "";

														$array_permissoes = array('1','47'); 
														echo (verificaPermissao($_SESSION["permissoes"],$array_permissoes)) ? "<option value='alta_responsavel.txt' title='Dados para envio à rede municipal sobre encaminhamento médico e multiprofissional de pacientes internados no HU'>Alta responsável - encaminhamentos médicos e multiprofissional</option>" : "";

													?>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-4 col-md-offset-4">
										<div class="col-md-6">
											<div class="form-group">
												<label for="dataInicio">Data inicial</label>
												<div class="input-group" align="center">
													<input type="date" class="form-control" id="dataInicio" name="dataInicio" class="form-control" required="">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="dataFim">Data final</label>
												<div class="input-group">
													<input type="date" class="form-control" id="dataFim" name="dataFim" class="form-control" required="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-4 col-md-offset-4">
										<div class="form-group">
											<label class="col-md-12"><button type="submit" name="submitExport" class="btn btn-success btn-block">Exportar</button></label>
											<label class="col-md-12"><button type="reset" class="btn btn-default btn-block">Limpar</button></label>
										</div>
									</div>
								</form>	
								
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