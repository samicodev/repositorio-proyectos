<?php 
session_start();
include('db.php');
if (isset($_SESSION['login']) && $_SESSION['rol']=='admin') {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		
		<!-- Title -->
		<title>Usuarios</title>

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
						<h6 class="modal-title">Usuarios</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form class="form-horizontal" action="guardar_usuario.php" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						
					
						<div class="form-group row">
							<label for="inputName" class="col-md-3 form-label">Rol</label>
							<div class="col-md-5">
								<select name="rol" id="rol" class="form-control" required>
									<option value="">Seleccione...</option>
  									<option value="admin">Administrador</option>
  									<option value="docente">Docente</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
    <label for="inputName" class="col-md-3 form-label">Nombres</label>
    <div class="col-md-9">
        <input type="text" placeholder="Nombres" class="form-control" required name="nombres" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail3" class="col-md-3 form-label">Usuario</label>
    <div class="col-md-5">
        <input type="text" name="usuario" class="form-control" required value="" placeholder="Usuario" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail3" class="col-md-3 form-label">Clave</label>
    <div class="col-md-5">
        <input type="text" name="clave" class="form-control" required value="" placeholder="Clave" id="clave_1" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail3" class="col-md-3 form-label">Confirmar Clave</label>
    <div class="col-md-5">
        <input type="text" class="form-control" required placeholder=" Confirmar Clave" id="clave_2" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail3" class="col-md-3 form-label">Teléfono</label>
    <div class="col-md-3">
        <input type="text" name="telefono" class="form-control" required value="" placeholder="Teléfono" autocomplete="off">
    </div>
</div>

					</div>
					<div class="modal-footer">
						<button class="btn btn-indigo" type="submit" name="btn_registrar" id="btn_registrar" disabled>Guardar</button> <button class="btn btn-light" data-dismiss="modal" type="button">Cancelar</button>
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
															<th class="border-bottom-0">Rol</th>
															<th class="border-bottom-0">Nombres</th>
															<th class="border-bottom-0">Usuario</th>
															<th class="border-bottom-0">Telefono</th>
															<th class="border-bottom-0">Opciones</th>
														</tr>
													</thead>
													<tbody>
												<?php foreach($mbd->query("SELECT * from usuario") as $fila) { ?>
														<tr>
															<td><?php echo $fila['rol']; ?></td>
															<td><?php echo $fila['nombres']; ?></td>
															<td><?php echo $fila['usuario']; ?></td>
															<td><?php echo $fila['telefono']; ?></td>
															<td>
						<a class="btn btn-link" href="elim_usuario.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')">
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
		<script>

			function claves() {
				var clave1=$('#clave_1').val();
				var clave2=$('#clave_2').val();
				if (clave1==clave2) {
					$('#clave_1').removeClass('form-control is-invalid').addClass('form-control');
					$('#clave_2').removeClass('form-control is-invalid').addClass('form-control');
					$('#btn_registrar').prop('disabled',false);
				}else{
					$('#clave_1').removeClass('form-control').addClass('form-control is-invalid');
					$('#clave_2').removeClass('form-control').addClass('form-control is-invalid');
					$('#btn_registrar').prop('disabled',true);
				}
			}

			$('#clave_1').keyup(function() { claves(); });
			$('#clave_1').change(function() { claves(); });


			$('#clave_2').keyup(function() { claves(); });
			$('#clave_2').change(function() { claves(); });

		</script>

	</body>
</html>
<?php }else{ header('location:login.php'); } ?>