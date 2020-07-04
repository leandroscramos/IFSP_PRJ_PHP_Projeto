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
										<tr>
											<td>DEX.SGQSP.PG0300.001</td>											
											<td>Documento Externo</td>
											<td><strong>Manual de diretrizes e requisitos do programa e selo Ebserh de qualidade</strong></td>
											<td>01</td>
											<td><span class="label label-warning">Aguardando revisão</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>DEX.SGQSP.PG0302.001</td>											
											<td>Documento Externo</td>
											<td><strong>Guia de avaliação do selo Ebserh de qualidade</strong></td>
											<td>01</td>
											<td><span class="label label-danger">Aguardando Aprovação</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>DEX.SGQSP.PG0304.001</td>											
											<td>Política Institucional</td>
											<td><strong>Política de Comunicação</strong></td>
											<td>01</td>
											<td><span class="label label-info">Aguardando Validação</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>DEX.SGQSP.PG0304.002</td>											
											<td>Política Institucional</td>
											<td><strong>Política de Gestão Ambiental</strong></td>
											<td>01</td>
											<td><span class="label label-success">Aprovado</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>DEX.SGQSP.PG0304.003</td>											
											<td>Política Institucional</td>
											<td><strong>Política de Gestão de Custos</strong></td>
											<td>01</td>
											<td><span class="label label-warning">Aguardando revisão</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.DAF.PG0203.005</td>
											<td>Política Institucional</td>
											<td><strong>Política de Gestão de Fornecedores de Pordutos e Serviços</strong></td>
											<td>01</td>
											<td><span class="label label-danger">Aguardando Aprovação</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.DIVGP.PG0203.006</td>
											<td>Regulamento</td>
											<td><strong>Regulamento da Gerência Administrativa</strong></td>
											<td>01</td>
											<td><span class="label label-info">Aguardando Validação</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.GA.PG0203.002</td>
											<td>Regimento</td>
											<td><strong>Regimento interno HU-UFSCar</strong></td>
											<td>01</td>
											<td><span class="label label-warning">Aguardando revisão</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.SL.PG0203.004</td>
											<td>Documento Externo</td>
											<td><strong>Manual do usuário VIGIHOSP - Software de gestão de riscos e segurança do paciente</strong></td>
											<td>01</td>
											<td><span class="label label-success">Aprovado</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.UCC.PG0203.003</td>
											<td>Documento Externo</td>
											<td><strong>Manual do usuário NOTIVISA - Módulo de notificação</strong></td>
											<td>01</td>
											<td><span class="label label-info">Aguardando Validação</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.UCS.PG0203.001</td>
											<td>Documento Externo</td>
											<td><strong>Manual do usuário NOTIVISA - Preenchimento dos formulários para notificação</strong></td>
											<td>01</td>
											<td><span class="label label-warning">Aguardando revisão</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>POL.USP.PG0203.008</td>
											<td>Política Institucional</td>
											<td><strong>Política de Gestão Financeira</strong></td>
											<td>01</td>
											<td><span class="label label-success">Aprovado</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
										<tr>
											<td>REG.SUP.PG0202.001</td>
											<td>Política Institucional</td>
											<td><strong>Política de Gestão de Pessoas</strong></td>
											<td>01</td>
											<td><span class="label label-info">Aguardando Validação</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>										
										<tr>
											<td>RGL.GA.PG0202.002</td>
											<td>Política Institucional</td>
											<td><strong>Política de Segurança do Paciente</strong></td>
											<td>01</td>
											<td><span class="label label-success">Aprovado</span></td>
											<td><span class="glyphicon glyphicon-edit"></td>
										</tr>
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