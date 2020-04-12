<?php 

$titulo="Intranet | HU UFSCar";
include $_SESSION["root"].'includes/header.php';
include_once $_SESSION["root"].'php/Util/Util.php';

Util::debug($_SESSION);
//Util::debug($data);
?>
	
	<div class="wrapper">
	  <!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
			
			<!-- Main content -->
			<section class="content">			
				<div class="row">					
					<div class="col-md-12">						
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title" title="UCM">ACOMPANHANTES E VISITANTES - HU UFSCAR - <?php echo date("d/m/Y - H:i"); ?> - <i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i></h3>
								<div class="panel-title pull-right" style="font-size: 9pt;">									
									Legenda	: &nbsp;
									<strong>A</strong> Acompanhante &nbsp;&nbsp;
									<strong>V</strong> Visitante &nbsp;&nbsp;
									<strong>T</strong> Total&nbsp;&nbsp;
									<i style='color: green' class='fa fa-square' aria-hidden='true'></i> Dentro do limite &nbsp;&nbsp;
									<i style='color: yellow' class='fa fa-square' aria-hidden='true'></i> Limite atingido &nbsp;&nbsp;
									<i style='color: red' class='fa fa-square' aria-hidden='true'></i> Limite ultrapassado &nbsp;
								</div>
							</div>
							<div class="box-body">
								<div class="col-md-4">						
									<div class="box box-info">
										<div class="box-header with-border">
											<h3 class="box-title">UNIDADE CLÍNICA MÉDICA</h3>												
										</div>
										<div class="box-body">
											<table class="table table-condensed table-hover">
												<thead>
													<tr bgcolor='#e7e7e7'>
														<th width="17%">Leito</th>										
														<th width="50%">Nome</th>
														<th width="10%">A</th>
														<th width="10%">V</th>
														<th width="10%">T</th>				
													</tr>
												</thead>													
                                                <?php                                                   
													foreach ($data as $key => $value){
                                                        echo "<tr>";
                                                            echo "<td>".$value[cd_leito]."</td>";
                                                            echo "<td>".$value[nm_paciente]."</td>";
                                                            echo "<td>".$value[nr_acompanhantes]."</td>";
                                                            echo "<td>".$value[nr_visitantes]."</td>";                                                            
                                                            echo "<td>".$value[nr_total_pessoas]."</td>";
                                                        echo "</tr>";
                                                    }                                                    
												?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</section>
		</div>
	<!-- /.content-wrapper -->
</body>
</html>