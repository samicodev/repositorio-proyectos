<?php 
session_start();
include('db.php');
if (isset($_SESSION['login'])) {
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
<title>Gráficos</title>

		<?php include('css.php'); ?>

	</head>

	<body class="app sidebar-mini">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="../img/loader.svg" alt="loader">
		</div>
		<!---/Global-loader-->

		<!-- Page -->
		<div class="page">
			<div class="page-main">

				<!--aside open-->
					<?php include('aside.php'); ?>
				<!--aside closed-->

				<div class="app-content">
					<div class="side-app">

						<!--app header-->
						<?php include('header.php'); ?>
						<!--/app header-->



						<!-- Row -->
						<div class="row">
							<div class="col-12">

								<!--div-->
								<div class="card">
									<div class="card-body pl-6 pr-6 pt-2 pb-3 ">
										<!-- contenido -->
										
										<div class="panel panel-primary">
											<div class=" tab-menu-heading p-0 bg-light">
												<div class="tabs-menu1 ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li class="">
															<a href="#tab5" class="active" data-toggle="tab"> 
																<i class="si si-graduation mr-2" style="font-size: 14pt;"></i> Por Carrera
															</a>
														</li>
														<li>
															<a href="#tab6" data-toggle="tab">
															<i class="si si-equalizer mr-2"></i>	Por Modalidad
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active " id="tab5">
														<div class="">
															<button class="btn btn-link btn-sm" onclick="window.print()">
																<i class="fa fa-print"></i> Imprimir reporte
															</button>
														</div>

													<div class="row">
														<div class="col-sm-12 col-md-10">
															<div class="chartjs-wrapper-demo">
																<canvas id="chartBar4" class="h-300"></canvas>
															</div>
														</div>
													</div>
													</div>
													<div class="tab-pane " id="tab6">
														<div class="">
															<button class="btn btn-link btn-sm" onclick="window.print()">
																<i class="fa fa-print"></i> Imprimir reporte
															</button>
														</div>
														<div class="row">
															<div class="col-sm-12 col-md-10">
																<div class="chartjs-wrapper-demo">
																	<canvas id="chartBar_m" class="h-300"></canvas>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
		

									</div>
								</div>
								<!--/div-->

							</div>
						</div>
						<!-- /Row -->

					</div>
				</div><!-- end app-content-->
			</div>




			<!--Footer-->
				<?php include('footer.php'); ?>
			<!-- End Footer-->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<?php include('jss.php'); ?>



<script>
	var carrers=[];
	var carrers_value=[];
	var carrers_color=[];
</script>

<?php 
foreach($mbd->query("SELECT * from carrera ORDER BY nombre ASC") as $fila_m) {
	$tot_car=0;
	foreach($mbd->query("SELECT count(id)as total from trabajos WHERE id_carrera=".$fila_m['id']) as $fila_t){
		$tot_car=$fila_t['total'];
	}
	?>
	<script>
		carrers.push("<?php echo $fila_m['nombre']; ?>");
		carrers_value.push(<?php echo $tot_car; ?>);
		carrers_color.push("#" + ((1<<24)*Math.random() | 0).toString(16));
	</script>
<?php } ?>


<script>
	var modals=[];
	var modals_value=[];
	var modals_color=[];
</script>
<?php 
foreach($mbd->query("SELECT * from modalidad ORDER BY nombre ASC") as $fila_md) {
	$tot_md=0;
	foreach($mbd->query("SELECT count(id)as total from trabajos WHERE id_modalidad=".$fila_md['id']) as $fila_tm){
		$tot_md=$fila_tm['total'];
	}
	?>
	<script>
		modals.push("<?php echo $fila_md['nombre']; ?>");
		modals_value.push(<?php echo $tot_md; ?>);
		modals_color.push("#" + ((1<<24)*Math.random() | 0).toString(16));
	</script>
<?php } ?>



<script>
	

	var ctx4 = document.getElementById('chartBar4').getContext('2d');
	new Chart(ctx4, {
		type: 'horizontalBar',
		data: {
			labels: carrers,
			datasets: [{
				label: 'Porcentaje (%) ',
				data: carrers_value,
				backgroundColor: carrers_color
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 11,
						fontColor: "#5E637D",
					},
					gridLines: {
						color: 'rgba(180, 183, 197, 0.1)'
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 12,
						fontColor: "#5E637D",
					},
					gridLines: {
						color: 'rgba(180, 183, 197, 0.1)'
					}
				}]
			}
		}
	});

</script>

<script>
	

	var ctx_m = document.getElementById('chartBar_m').getContext('2d');
	new Chart(ctx_m, {
		type: 'horizontalBar',
		data: {
			labels: modals,
			datasets: [{
				label: 'Porcentaje (%) ',
				data: modals_value,
				backgroundColor: modals_color
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 11,
						fontColor: "#5E637D",
					},
					gridLines: {
						color: 'rgba(180, 183, 197, 0.1)'
					}
				}],
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontSize: 12,
						fontColor: "#5E637D",
					},
					gridLines: {
						color: 'rgba(180, 183, 197, 0.1)'
					}
				}]
			}
		}
	});

</script>



	</body>
</html>

<?php }else{ header('location:login.php'); } ?>