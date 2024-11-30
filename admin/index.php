<?php 
session_start();
if (isset($_SESSION['login'])) {
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
<title>Inicio</title>

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
									<div class="card-header">
										<div class="card-title">
										  <h2>
											SISTEMA DE REPOSITORIO DE PROYECTOS DE EGRESADOS
										<h2/>
										</div>
									</div>
									<div class="card-body">
										<!-- contenido -->
										<img src="../img/imagen0.jpg" alt="" style="max-width: 100%;width: 99%;">
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


	</body>
</html>

<?php }else{ header('location:login.php'); } ?>