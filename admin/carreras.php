<?php 
session_start();
include('db.php');
if (isset($_SESSION['login']) && $_SESSION['rol']=='admin') {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Title -->
		<title>Carreras</title>

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



		<div class="modal" id="modalcrud" data-backdrop="static" data-keyboard="false"> 
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Estudiantes</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form class="form-horizontal" action="guardar_carrera.php" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						
						<div class="form-group row">
							<label for="inputName" class="col-md-3 form-label">Carrera</label>
							<div class="col-md-7">
								<input type="text" placeholder="Carrera" class="form-control" required name="nombre" autocomplete="off">
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button class="btn btn-indigo" type="submit" name="btn_registrar">Guardar</button> <button class="btn btn-light" data-dismiss="modal" type="button">Cancelar</button>
					</div>
					</form>
				</div>
			</div>
		</div>


						<!-- Row -->
						<div class="row">
							<div class="col-12">

								<!--div-->
								<div class="card">
									<div class="card-header pt-2">
										<div class="card-title">
											<button class="btn btn-success" data-target="#modalcrud" data-toggle="modal">
												<i class="fa fa-plus"></i> Agregar
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="">
											<div class="table-responsive">
												<table id="example" class="table table-bordered text-nowrap key-buttons">
													<thead>
														<tr>
															<th class="border-bottom-0">ID</th>
															<th class="border-bottom-0">Carrera</th>
															<th class="border-bottom-0">Opciones</th>
														</tr>
													</thead>
													<tbody>
												<?php foreach($mbd->query("SELECT * from carrera") as $fila) { ?>
														<tr>
															<td><?php echo $fila['id']; ?></td>
															<td><?php echo $fila['nombre']; ?></td>
															<td>
						<a class="btn btn-link" href="elim_carrera.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')">
							<i class="fa fa-remove"></i> 
						</a>
															</td>
														</tr>
												<?php } ?>
													</tbody>
												</table>
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


	</body>
</html>
<?php }else{ header('location:login.php'); } ?>