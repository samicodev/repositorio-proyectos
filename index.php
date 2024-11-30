<?php
include('admin/db.php');

$sql = "SELECT t.*, mo.nombre as modalidad from trabajos as t, modalidad as mo WHERE t.id_modalidad=mo.id";

$buscar = '';
if (isset($_GET['q'])) {
	$buscar = $_GET['q'];
	$sql = "SELECT t.*, mo.nombre as modalidad from trabajos as t, modalidad as mo WHERE t.id_modalidad=mo.id AND  t.titulo like '%$buscar%' ";
}


if (isset($_GET['carrera'])) {
	$v_carrera = $_GET['carrera'];
	$sql = "SELECT t.*, mo.nombre as modalidad from trabajos as t, modalidad as mo WHERE t.id_modalidad=mo.id and t.id in (SELECT id_proyecto FROM integrantes WHERE id_estudiante in (SELECT id FROM estudiante WHERE id_carrera=$v_carrera))";
}


if (isset($_GET['modalidad'])) {
	$v_modalidad = $_GET['modalidad'];
	$sql = "SELECT t.*, mo.nombre as modalidad from trabajos as t, modalidad as mo WHERE t.id_modalidad=mo.id AND mo.id='$v_modalidad' ";
}

if (isset($_GET['anio'])) {
	$v_anio = $_GET['anio'];
	$sql = "SELECT t.*, mo.nombre as modalidad FROM trabajos as t, modalidad as mo WHERE t.id_modalidad=mo.id AND t.anio='$v_anio'";
}

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>

	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>

	<!-- Title -->
	<title>Proyectos Incos Pando</title>

	<!--Favicon -->
	<link rel="icon" href="img/logo.png" type="image/x-icon" />

	<!-- Bootstrap css -->
	<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

	<!-- Style css -->
	<link href="assets/css/style.css" rel="stylesheet" />

	<!-- Dark css -->
	<link href="assets/css/dark.css" rel="stylesheet" />

	<!-- Skins css -->
	<link href="assets/css/skins.css" rel="stylesheet" />

	<!-- Animate css -->
	<link href="assets/css/animated.css" rel="stylesheet" />

	<!-- P-scroll bar css-->
	<link href="assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

	<!---Icons css-->
	<link href="assets/css/icons.css" rel="stylesheet" />

	<script src="https://mozilla.github.io/pdf.js/build/pdf.mjs" type="module"></script>
	<style>
		#the-canvas {
			border: 1px solid black;
			width: 100%;
			height: auto;
		}

		.titulo-pagina {
			color: #fff001;
		}
	</style>

</head>

<body class="dark-mode">

	<!---Global-loader-->
	<div id="global-loader">
		<img src="img/loader.svg" alt="loader">
	</div>
	<!---/Global-loader-->

	<!-- Page -->
	<div class="page">
		<div class="page-main">

			<!--header-->
			<div class="hor-header header">
				<div class="container">
					<div class="d-flex align-items-center">
						<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- horizontal-navtoggle-->
						<a class="header-brand" href="index.php">
							<img src="img/logo.png" class="header-brand-img desktop-lgo" alt="INCOS" style="width:40px;height:auto;">

							<img src="img/logo.png" class="header-brand-img mobile-logo" alt="INCOS" style="width:30px;height:auto;">
							<img src="img/logo.png" class="header-brand-img darkmobile-logo" alt="INCOS">
						</a>
						<div class="mt-1">
							<form class="form-inline" action="index.php">
								<div class="search-element">
									<input type="search" class="form-control header-search" placeholder="Titulo de Proyecto" aria-label="Search" tabindex="1" name="q" autocomplete="off" required value="<?php echo $buscar; ?>">
									<button class="btn btn-primary-color" type="submit">
										<svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
											<path d="M0 0h24v24H0V0z" fill="none" />
											<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
										</svg>
									</button>
								</div>
							</form>
						</div><!-- SEARCH -->
						<div class="d-flex order-lg-2 ml-auto">
							<a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
								<svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
									<path d="M0 0h24v24H0V0z" fill="none" />
									<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
								</svg>
							</a>

							<div class="dropdown   header-fullscreen">
								<a class="nav-link icon full-screen-link p-0" id="fullscreen-button">
									<svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
										<path d="M7,14 L5,14 L5,19 L10,19 L10,17 L7,17 L7,14 Z M5,10 L7,10 L7,7 L10,7 L10,5 L5,5 L5,10 Z M17,17 L14,17 L14,19 L19,19 L19,14 L17,14 L17,17 Z M14,5 L14,7 L17,7 L17,10 L19,10 L19,5 L14,5 Z"></path>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header-->

			<!-- Horizontal-menu -->
			<div class="sticky">
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true">
									<a href="index.php" class="sub-icon">
										<span class="hor-shape1"></span>
										<span class="hor-shape2"></span>
										<span class="hor-arrow"></span>
										<svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
											<polyline points="9 22 9 12 15 12 15 22"></polyline>
										</svg>
										Inicio
									</a>
								</li>

								<li aria-haspopup="true">
									<a href="#" class="sub-icon">
										<span class="hor-shape1"></span>
										<span class="hor-shape2"></span>
										<span class="hor-arrow"></span>
										<svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
											<polyline points="2 17 12 22 22 17"></polyline>
											<polyline points="2 12 12 17 22 12"></polyline>
										</svg>
										Por carrera <i class="fa fa-angle-down horizontal-icon"></i>
									</a>
									<ul class="sub-menu">
										<?php foreach ($mbd->query("SELECT * from carrera") as $fila) { ?>
											<li><a href="index.php?carrera=<?php echo $fila['id']; ?>">
													<?php echo $fila['nombre']; ?></a>
											</li>
										<?php } ?>
									</ul>
								</li>

								<li aria-haspopup="true"><a href="#" class="sub-icon ">
										<span class="hor-shape1"></span>
										<span class="hor-shape2"></span>
										<span class="hor-arrow"></span>
										<svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
											<polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
											<line x1="12" y1="22.08" x2="12" y2="12"></line>
										</svg>
										Por modalidad <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<?php foreach ($mbd->query("SELECT * from modalidad") as $fila) { ?>
											<li aria-haspopup="true"><a href="index.php?modalidad=<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></a></li>
										<?php } ?>
									</ul>
								</li>

								<li aria-haspopup="true">
									<a href="#" class="sub-icon">
										<span class="hor-shape1"></span>
										<span class="hor-shape2"></span>
										<span class="hor-arrow"></span>
										<!-- Ícono de calendario -->
										<svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
											<line x1="16" y1="1" x2="16" y2="4"></line>
											<line x1="8" y1="1" x2="8" y2="4"></line>
											<line x1="3" y1="11" x2="21" y2="11"></line>
										</svg>
										Por año <i class="fa fa-angle-down horizontal-icon"></i>
									</a>
									<ul class="sub-menu">
										<?php foreach ($mbd->query("SELECT DISTINCT anio FROM trabajos ORDER BY anio DESC") as $fila) { ?>
											<li aria-haspopup="true"><a href="index.php?anio=<?php echo $fila['anio']; ?>"><?php echo $fila['anio']; ?></a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<!-- Main-content -->
			<div class="main-content">
				<div class="container">

					<!--Page header-->
					<div class="page-header">
						<div class="page-leftheader">
							<h4 class="titulo-pagina">Proyectos Académicos - Instituto Técnico Incos Pando</h4>
						</div>
						<div class="page-rightheader ml-auto d-lg-flex d-none">

						</div>
					</div>
					<!--End Page header-->

					<!-- Row -->
					<div class="row">

						<!-- proyecto -->
						<?php foreach ($mbd->query($sql) as $fila) {
							$docu_url = $fila['archivo'];
						?>
							<div class="col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-body d-flex flex-column">
										<h4><a href="#"> <?php echo $fila['titulo']; ?> </a></h4>
										<div class="text-muted">
											<?php echo $fila['descripcion']; ?>
										</div>
										<div class="text-muted" style="text-align: right;">
											<?php echo $fila['anio']; ?>
										</div>
									</div>
									<div class="card-body">
										<div class="d-flex align-items-center mt-auto">
											<div class="avatar brround avatar-md mr-3" style="background-image: url(img/user.png)">

											</div>
											<div>
												<a href="#" class="font-weight-semibold">
													<?php
													$id_proy = $fila['id'];
													$sqli = 'SELECT it.*, et.nombres as estudiante,ca.nombre as carrera  from integrantes as it, estudiante as et, carrera as ca WHERE it.id_estudiante=et.id AND et.id_carrera=ca.id AND it.id_proyecto=' . $id_proy;
													foreach ($mbd->query($sqli) as $filai) { ?>
														<div style="display: flex;align-items: center;">
															<?php echo $filai['estudiante']; ?> - <span class="text-warning ml-2"><?php echo $filai['carrera']; ?> </span>
														</div>
													<?php } ?>
												</a>
												<small class="d-block text-muted">
													<?php echo $fila['modalidad']; ?>
												</small>

											</div>
											<div class="ml-auto text-muted">

												<a class="btn btn-block mb-3" href="pdf-viewer/pdf.php?view=<?php echo $fila['archivo']; ?>" target="_blank">
													<i class="fa fa-file-pdf-o fs-16" style="font-size: 18pt;color: #EE3C3C;"></i>
												</a>

											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<!-- end proyecto -->

					</div>
					<!--End Row-->

				</div>
			</div><!-- end app-content-->
		</div>

		<div class="modal fade" id="modal_pdf" tabindex="-1" role="dialog" aria-labelledby="modalPdfLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalPdfLabel">Visualizador de PDF</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="loader" style="display: none; text-align: center; font-size: 18px;">
							Cargando...
						</div>

						<canvas id="pdf_canvas" style="width: 100%; display: none;"></canvas>
						<div class="d-flex justify-content-end">
							<div>

								<span>Página: <span id="page_num"></span> / <span id="page_count"></span></span>
								&nbsp; &nbsp;
								<button id="prev" style="display: none;">Anterior</button>
								<button id="next" style="display: none;">Siguiente</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Footer-->
		<footer class="footer">
			<div class="container">
				<div class="row align-items-center flex-row-reverse">
					<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
						Copyright © 2024 - <a href="#"> Carlos daniel</a>. Todos los derechos reservados.
						<a href="admin/login.php" class="text-warning btn-admin">Administrar</a>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer-->

	</div>

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

	<!-- Jquery js-->
	<script src="assets/js/jquery-3.5.1.min.js"></script>

	<!-- Bootstrap4 js-->
	<script src="assets/plugins/bootstrap/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!--Othercharts js-->
	<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

	<!-- Circle-progress js-->
	<script src="assets/js/circle-progress.min.js"></script>

	<!-- Jquery-rating js-->
	<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

	<!--Horizontal js-->
	<script src="assets/plugins/horizontal-menu/horizontal.js"></script>

	<!--Stiky js-->
	<script src="assets/js/stiky.js"></script>

	<!-- P-scroll js-->
	<script src="assets/plugins/p-scrollbar/p-scrollbar.js"></script>

	<!-- Loader js-->
	<script src="assets/js/loader.js"></script>

	<!-- Custom js-->
	<script src="assets/js/custom.js"></script>

	<script>
		var cod_cptch = '';
		var archiv = '';

		function txt_random(length, current) {
			current = current ? current : '';
			return length ? txt_random(--length, "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz".charAt(Math.floor(Math.random() * 60)) + current) : current;
		}

		function generar() {
			cod_cptch = txt_random(5);
			$('#div_cod').html(cod_cptch);
			$('#txt_cod').val('');
			$('#op_descargar').hide();
			$('#div_error').hide();
		}

		function verificar() {
			var txt_verif = $('#txt_cod').val();
			if (txt_verif == cod_cptch) {
				$('#div_error').hide();
				$('#op_descargar').show();
				$('#op_descargar').attr('href', 'docs/' + archiv);


			} else {
				$('#div_error').show();
				$('#op_descargar').hide();
			}
		}
	</script>

	<script type="module">
		pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.mjs';

		let pdfDoc = null,
			pageNum = 1,
			pageRendering = false,
			pageNumPending = null,
			scale = 1.5,
			canvas = document.getElementById('pdf_canvas'),
			ctx = canvas.getContext('2d');
		const loader = document.getElementById('loader');

		window.open_modal = function(url) {
			pageNum = 1;
			pdfDoc = null;
			$('#modal_pdf').modal('show');

			loader.style.display = 'block'; // Mostrar el loader
			canvas.style.display = 'none'; // Ocultar el canvas

			pdfjsLib.getDocument('docs/' + url).promise.then(function(pdfDoc_) {
				pdfDoc = pdfDoc_;
				document.getElementById('page_count').textContent = pdfDoc.numPages;

				document.getElementById('prev').style.display = 'inline';
				document.getElementById('next').style.display = 'inline';

				// Renderizar la primera página
				renderPage(pageNum);
			});
		}

		function renderPage(num) {
			pageRendering = true;
			pdfDoc.getPage(num).then(function(page) {
				var viewport = page.getViewport({
					scale: scale
				});
				canvas.height = viewport.height;
				canvas.width = viewport.width;

				var renderContext = {
					canvasContext: ctx,
					viewport: viewport
				};
				var renderTask = page.render(renderContext);
				renderTask.promise.then(function() {
					pageRendering = false;
					loader.style.display = 'none'; // Ocultar el loader
					canvas.style.display = 'block'; // Mostrar el canvas

					if (pageNumPending !== null) {
						renderPage(pageNumPending);
						pageNumPending = null;
					}
				});
			});
			document.getElementById('page_num').textContent = num;
		}

		function queueRenderPage(num) {
			if (pageRendering) {
				pageNumPending = num;
			} else {
				renderPage(num);
			}
		}

		function onPrevPage() {
			if (pageNum <= 1) {
				return;
			}
			pageNum--;
			queueRenderPage(pageNum);
		}

		function onNextPage() {
			if (pageNum >= pdfDoc.numPages) {
				return;
			}
			pageNum++;
			queueRenderPage(pageNum);
		}

		document.getElementById('prev').addEventListener('click', onPrevPage);
		document.getElementById('next').addEventListener('click', onNextPage);

		$('#modal_pdf').on('hide.bs.modal', function() {
			document.getElementById('prev').style.display = 'none';
			document.getElementById('next').style.display = 'none';
			ctx.clearRect(0, 0, canvas.width, canvas.height);
			loader.style.display = 'none'; // Asegurarse de ocultar el loader al cerrar el modal
			canvas.style.display = 'none'; // Asegurarse de ocultar el canvas al cerrar el modal
		});
	</script>

	<script>
		// Al mostrar el modal, desactivar el menú contextual
		$('#modal_pdf').on('shown.bs.modal', function() {
			// Desactivar el menú contextual en el modal
			$(this).on('contextmenu', function(e) {
				e.preventDefault();
			});
		});

		// Opcional: volver a activar el menú contextual al cerrar el modal
		$('#modal_pdf').on('hide.bs.modal', function() {
			$(this).off('contextmenu'); // Quitar el evento contextmenu
		});
	</script>

</body>

</html>