<?php 
session_start();
include('db.php');

if (isset($_SESSION['login'])) {

$v_anio='';
$v_modal='';
$sql='';
if (isset($_GET['anio']) && isset($_GET['modalidad'])) {
	$v_anio=$_GET['anio'];
	$v_modal=$_GET['modalidad'];

	$sql="SELECT it.*,estu.nombres,estu.documento,t.titulo, mo.nombre as modalidad from trabajos as t, modalidad as mo,integrantes as it, estudiante as estu WHERE t.id_modalidad=mo.id and mo.nombre='$v_modal' AND t.anio=$v_anio AND it.id_proyecto=t.id AND it.id_estudiante=estu.id"; 
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
<title>Reporte anual</title>

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
											Reporte anual
										</div>
									</div>
									<div class="card-body">
										<form action="reportes.php" method="GET">
										<div class="row">
											<div class="col-lg-3">
												<label for=""> Seleccione Año y Modalidad: </label>
											</div>
											<div class="col-lg-3">
												<select name="anio" class="form-control" required>
													<option value="">Seleccione...</option>
													<option value="2023">2023</option>
													<option value="2024">2024</option>
													<option value="2025">2025</option>
													<option value="2026">2026</option>
												</select>
											</div>

											<div class="col-lg-3">
												<select name="modalidad" class="form-control" required>
													<option value="">Seleccione...</option>
							<?php foreach($mbd->query("SELECT * from modalidad") as $fila_m) { ?>
								<option value="<?php echo $fila_m['nombre']; ?>">
									<?php echo $fila_m['nombre']; ?>	
								</option>
							<?php } ?>
												</select>
											</div>



											<div class="col-lg-3">
												<button class="btn btn-primary">
													<i class="fa fa-search"></i> Buscar
												</button>

												<button class="btn btn-link" type="button" onclick="imprimir()">
													<i class="fa fa-print text-info" style="font-size: 15pt;"></i>
												</button>
											</div>
										</div>
										</form>
										<br>
										<div id="div_print">
											
										
										<div class="row p-3 mb-2" style="background-color: #eff0f6;border-radius: 10px;">
											<div class="col-lg-9">
												<b><span class="text-info">MODALIDAD: </span></b> <span><?php echo $v_modal; ?></span>
											</div>
											<div class="col-lg-3">
												<b><span class="text-info">AÑO: </span></b> <span><?php echo $v_anio; ?></span>
											</div>
										</div>	
											
											<table class="table">
												<thead>
													<th>N°</th>
													<th>NÓMINA ESTUDIANTES</th>
													<th>CÉDULA DE IDENTIDAD </th>
													<th>TÍTULO DEL PROYECTO</th>
													<th>CALIFICACIÓN</th>
													<th>OBSERVACIONES</th>
												</thead>
												<tbody>
									<?php if($sql!='') { ?>
										<?php $x=1; ?>
										<?php foreach($mbd->query($sql) as $fila) { ?>
											<tr>
												<td><?php echo $x; ?></td>
												<td><?php echo $fila['nombres']; ?></td>
												<td><?php echo $fila['documento']; ?></td>
												<td><?php echo $fila['titulo']; ?></td>
												<td><?php echo $fila['nota']; ?></td>
												<td><?php echo $fila['observacion']; ?></td>
											</tr>
										<?php $x++; ?>
										<?php } ?>
									<?php } ?>

												</tbody>
											</table>
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

function imprimir() {
        const $elementoParaConvertir = $('#div_print').html();
        html2pdf()
            .set({
                margin: 0.5,
                filename: 'Reporte_anual.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a3',
                    orientation: 'portrait'
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err=>console.log(err));

    }
</script>

	</body>
</html>

<?php }else{ header('location:login.php'); } ?>