<?php
session_start();
include('db.php');
if (isset($_SESSION['login'])) {
?>
	<!DOCTYPE html>
	<html lang="es" dir="ltr">

	<head>
		<!-- Title -->
		<title>Proyectos de graduación</title>

		<?php include('css.php'); ?>

	</head>

	<body class="app sidebar-mini">

		<!---Global-loader-->
		<div id="global-loader">
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
										<h6 class="modal-title">Proyectos</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="guardar_proyecto.php">
										<div class="modal-body">
											<input type="hidden" name="id_trabajo" id="id_trabajo">

											<div class="form-group row">
												<label for="inputName" class="col-md-3 form-label">Modalidad</label>
												<div class="col-md-7">
													<select name="modalidad" id="modalidad" class="form-control" required>
														<option value="">Seleccione...</option>
														<?php foreach ($mbd->query("SELECT * from modalidad") as $fila) { ?>
															<option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>

														<?php } ?>
													</select>
												</div>
											</div>



											<div class="form-group row">
												<label for="carrera_id" class="col-md-3 form-label">Carrera</label>
												<div class="col-md-7">
													<select name="carrera_id" id="carrera_id" class="form-control" require>
														<option value="">Seleccione...</option>
														<?php foreach ($mbd->query("SELECT * from carrera ORDER BY nombre ASC") as $fila) { ?>
															<option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="inputName" class="col-md-3 form-label">Título</label>
												<div class="col-md-9">
													<textarea placeholder="Título..." class="form-control" rows="2" required name="titulo" id="titulo"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail3" class="col-md-3 form-label">Descripción</label>
												<div class="col-md-9">
													<textarea placeholder="Descripción..." class="form-control" rows="5" name="descripcion" id="descripcion" required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="archivo" class="col-md-3 form-label">Archivo</label>
												<div class="col-md-7">
													<input type="file" accept=".pdf" name="archivo" id="archivo" class="form-control" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="cod" class="col-md-3 form-label">Código</label>
												<div class="col-md-3">
													<input placeholder="Código..." type="text" name="cod" class="form-control" required value="" id="cod" autocomplete="off">
												</div>
												<label for="anio" class="col-md-3 form-label">Año</label>
												<div class="col-md-3">
													<input placeholder="Año..." type="number" name="anio" class="form-control" required value="" id="anio" autocomplete="off">
												</div>
											</div>

										</div>
										<div class="modal-footer">
											<button class="btn btn-indigo" type="submit" name="btn_guardar">Guardar</button> <button class="btn btn-light" data-dismiss="modal" type="button">Cancelar</button>
										</div>
									</form>
								</div>
							</div>
						</div>



						<div class="modal" id="modal_integrante" data-backdrop="static" data-keyboard="false">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">Integrante</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form class="form-horizontal" action="guardar_integrante.php" method="POST" enctype="multipart/form-data">
										<div class="modal-body">

											<input type="hidden" name="id_proy" id="id_proy">


											<div class="form-group row">
												<label for="inputName" class="col-md-3 form-label">Carrera</label>
												<div class="col-md-5">
													<select name="id_carrera" id="carrera" class="form-control" required>
														<option value="">Seleccione...</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="inputName" class="col-md-3 form-label">Estudiante</label>
												<div class="col-md-9">
													<select name="id_estudiante" id="id_estudiante" class="form-control" required>
														<option value="">Seleccione...</option>
													</select>
												</div>
											</div>


											<div class="form-group row">
												<label for="inputEmail3" class="col-md-3 form-label">Nota</label>
												<div class="col-md-4">
													<input type="number" name="nota" class="form-control" required min="0" max="100" placeholder="Nota" autocomplete="off">
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
    <div class="card-title d-flex justify-content-between w-95">
        <button class="btn btn-success" onclick="abrirModal()">
            <i class="fa fa-plus"></i> Agregar
        </button>
        
		<!-- Nuevo botón para descargar todos los QR -->
		<button class="btn btn-primary" id="descargarQR">
        <i class="fa fa-qrcode"></i> Descargar todos los QR
    </button>
    </div>
									</div>
									<div class="card-body">
										<div class="">
											<div class="table-responsive">
												<!-- text-nowrap -->
												<table id="example" class="table table-bordered  key-buttons">
													<thead>
														<tr>
															<th class="border-bottom-0">Año</th>
															<th class="border-bottom-0">Integrantes</th>
															<th class="border-bottom-0">Modalidad</th>
															<th class="border-bottom-0">Código</th>
															<th class="border-bottom-0">Título</th>
															<th class="border-bottom-0">Descripcion</th>
															<th class="border-bottom-0">Opciones</th>
														</tr>
													</thead>
													<tbody>
														<?php $sql = 'SELECT t.*, mo.nombre as modalidad from trabajos as t, modalidad as mo WHERE t.id_modalidad=mo.id';
														foreach ($mbd->query($sql) as $fila) {
															$id_proyec = $fila['id'];
														?>
															<tr>
																<td><?php echo $fila['anio']; ?></td>
																<td>

																	<?php
																	$aux = 0;
																	$sqla = "SELECT COUNT(id)as total from integrantes WHERE id_proyecto=" . $id_proyec;
																	foreach ($mbd->query($sqla) as $filaa) {
																		$aux = $filaa['total'];
																	}
																	if (($fila['id_modalidad'] == 6 && $aux < 4) || ($fila['id_modalidad'] != 6 && $aux < 2)) {  ?>
																		<button class="btn btn-link btn-sm" data-target="#modal_integrante" data-toggle="modal" onclick="add_integrante(<?php echo $fila['id']; ?>,<?php echo $fila['id_carrera']; ?>,<?php echo $fila['id_modalidad']; ?>)">
																			<i class="fa fa-user-plus"></i> Agregar
																		</button>
																	<?php } ?>

																	<?php $sqli = 'SELECT it.*, et.nombres as estudiante from integrantes as it, estudiante as et WHERE it.id_estudiante=et.id AND it.id_proyecto=' . $id_proyec;
																	foreach ($mbd->query($sqli) as $filai) { ?>
																		<div style="display: flex;align-items: center;">
																			<?php echo $filai['estudiante']; ?>
																			<a class="btn btn-link btn-sm" href="elim_integrante.php?id=<?php echo $filai['id']; ?>" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')">
																				<i class="fa fa-remove"></i>
																			</a>
																		</div>
																	<?php } ?>
																</td>

																<td>
																	<?php echo $fila['modalidad']; ?>

																	<?php
																	$id_carre = $fila['id_carrera'];
																	if ($id_carre != 0) {
																		$sqlm = "SELECT * from carrera WHERE id=" . $id_carre;
																		foreach ($mbd->query($sqlm) as $filam) { ?>
																			<br>
																			<small class="text-info"><?php echo $filam['nombre']; ?></small>
																	<?php }
																	} ?>

																</td>
																<td>
																	<?php echo $fila['cod']; ?>
																</td>
																<td>
																	<?php
																	$maxLength = 100;
																	if (strlen($fila['titulo']) > $maxLength) {
																		$truncatedText = substr($fila['titulo'], 0, $maxLength) . '...';
																		echo $truncatedText;
																	} else {
																		echo $fila['titulo'];
																	}
																	?>
																</td>
																<td>
																	<?php
																	$maxLength = 150;
																	if (strlen($fila['descripcion']) > $maxLength) {
																		$truncatedText = substr($fila['descripcion'], 0, $maxLength) . '...';
																		echo $truncatedText;
																	} else {
																		echo $fila['descripcion'];
																	}
																	?>
																</td>
																<td>
																	<a href="#" class="btn btn-link" onclick="editar('<?php echo $fila['id']; ?>')">
																		<i class="fa fa-edit"></i> Editar
																	</a>



																	<a class="btn btn-link" href="elim_trabajo.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')">
																		<i class="fa fa-trash"></i> Eliminar
																	</a>

																	<a href="generar_qr.php?cod=<?php echo $fila['cod']; ?>" class="btn btn-link" >
																		<i class="fa fa-qrcode"></i> Descargar QR
																	</a>
																	
																	<a href="generar_pdf.php?id_proyecto=<?php echo $fila['id']; ?>" class="btn btn-link">
																		<i class="fa fa-file-pdf-o"></i> Certificacion
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

		<!-- Plugin sweet alert2 -->
		<script src="../assets/plugins/sweet-alert2/sweetalert2.js"></script>
		
		<?php
		// Verificar si existe el parámetro 'status' en la URL
		if (isset($_GET['status']) && $_GET['status'] == 'error') {
				echo "
				<script>
						Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'El código de proyecto ya existe. Por favor, intenta con otro código.',
								confirmButtonText: 'Entendido',
								timer: 5000, 
								timerProgressBar: true,
						});
				</script>";
		}
		?>							

		<script>
			function editar(idtrabajo) {
				$.ajax({
					url: 'ajax_trabajo.php',
					type: 'POST',
					data: {
						idtrabajo: idtrabajo
					},
					success: function(response) {
						var data = JSON.parse(response);
						document.getElementById('id_trabajo').value = data.id;
						document.getElementById('modalidad').value = data.id_modalidad;
						document.getElementById('carrera_id').value = data.id_carrera;
						document.getElementById('cod').value = data.cod;
						document.getElementById('titulo').value = data.titulo;
						document.getElementById('descripcion').value = data.descripcion;
						document.getElementById('anio').value = data.anio;

						$('#archivo').removeAttr('required');

						$('#modalcrud').modal('show');
					}
				});
			}

			function abrirModal() {
				document.getElementById('id_trabajo').value = '';
				document.getElementById('modalidad').value = '';
				document.getElementById('carrera_id').value = '';
				document.getElementById('titulo').value = '';
				document.getElementById('descripcion').value = '';
				document.getElementById('anio').value = '';

				$('#archivo').attr('required', true);

				$('#modalcrud').modal('show');
			}
		</script>


		<?php include('jss.php'); ?>

		<script>
			function add_integrante(id_proy, id_car, id_mod) {
				$('#id_proy').val(id_proy);
				$('#carrera').val('');
				$('#id_estudiante').html('<option value="">Seleccione...</option>');
				$.ajax({
					url: "ajax_carreras.php",
					data: {
						id_carrera: id_car,
						id_mod: id_mod
					},
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						$('#carrera').html(data.lista);
					}
				});
			}

			function listar_estuds(id_carrera) {
				$.ajax({
					url: "ajax_estudiantes.php",
					data: {
						id_carrera: id_carrera
					},
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						$('#id_estudiante').html(data.lista);
					}
				});
			}

			$('#carrera').change(function() {
				if ($(this).val() != '') {
					listar_estuds($(this).val());
				} else {
					$('#id_estudiante').html('<option value="">Seleccione...</option>');
				}
			});
		</script>

<script>
        $(document).ready(function() {
            $('#descargarQR').on('click', function() {
                $.ajax({
                    url: 'generar_qr_todos.php',  // URL al archivo PHP que genera el PDF
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.pdfFile) {
                            // Abrir el archivo PDF en una nueva pestaña
                            window.open(response.pdfFile, '_blank');
                        } else if (response.error) {
                            alert(response.error);
                        }
                    },
                    error: function() {
                        alert('Error al generar el archivo PDF.');
                    }
                });
            });
        });
    </script>

	</body>

	</html>
<?php } else {
	header('location:login.php');
} ?>