<?php 
session_start();
include('db.php');
if (isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Estudiantes</title>
    <?php include('css.php'); ?>
</head>
<body class="app sidebar-mini">
    <div class="page">
        <div class="page-main">
            <?php include('aside.php'); ?>
            <div class="app-content">
                <div class="side-app">
                    <?php include('header.php'); ?>
                    <div class="modal" id="modalcrud" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Registrar Estudiante</h6>
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="guardar_estudiante.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_estudiante" id="id_estudiante">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-label">Carrera</label>
                                            <div class="col-md-5">
                                                <select name="id_carrera" id="carrera" class="form-control" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach($mbd->query("SELECT * from carrera") as $fila) { ?>
                                                        <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
    <label class="col-md-3 form-label">Documento</label>
    <div class="col-md-5">
        <input type="text" name="documento" id="documento" class="form-control" required value="" placeholder="Cedula" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-label">Nombres y Apellidos</label>
    <div class="col-md-9">
        <input type="text" name="nombres" id="nombres" class="form-control" required value="" placeholder="Nombres" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-label">Correo</label>
    <div class="col-md-7">
        <input type="email" name="correo" id="correo" class="form-control" required value="" placeholder="Correo" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-label">Teléfono</label>
    <div class="col-md-3">
        <input type="text" name="telefono" id="telefono" class="form-control" required value="" placeholder="Telefono" autocomplete="off">
    </div>
</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-indigo" type="submit" name="btn_registrar">Guardar</button>
                                        <button class="btn btn-light" data-dismiss="modal" type="button">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header pt-2">
										<div class="card-title">
											<button class="btn btn-success" onclick="abrirModal()">
												<i class="fa fa-plus"></i> Agregar
											</button>
										</div>
									</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th>Carrera</th>
                                                    <th>Documento</th>
                                                    <th>Nombres</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($mbd->query("SELECT et.*, ca.nombre as carrera from estudiante as et, carrera as ca WHERE et.id_carrera=ca.id") as $fila) { ?>
                                                    <tr>
                                                        <td><?php echo $fila['carrera']; ?></td>
                                                        <td><?php echo $fila['documento']; ?></td>
                                                        <td><?php echo $fila['nombres']; ?></td>
                                                        <td><?php echo $fila['correo']; ?></td>
                                                        <td><?php echo $fila['telefono']; ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-link" onclick="editar(<?php echo $fila['id']; ?>, '<?php echo $fila['id_carrera']; ?>', '<?php echo $fila['documento']; ?>', '<?php echo $fila['nombres']; ?>', '<?php echo $fila['correo']; ?>', '<?php echo $fila['telefono']; ?>')">
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>
                                                            <a class="btn btn-link" href="elim_estudiante.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que desea eliminar?')">
                                                                <i class="fa fa-remove"></i> Eliminar
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
                    </div>
                    <!-- /Row -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function editar(id, carrera, documento, nombres, correo, telefono) {
            document.getElementById('id_estudiante').value = id;
            document.getElementById('carrera').value = carrera;
            document.getElementById('documento').value = documento;
            document.getElementById('nombres').value = nombres;
            document.getElementById('correo').value = correo;
            document.getElementById('telefono').value = telefono;
            $('#modalcrud').modal('show');
        }

        /* $('#modalcrud').on('hidden.bs.modal', function () {
            document.getElementById('id_estudiante').value = '';
            document.getElementById('carrera').value = '';
            document.getElementById('documento').value = '';
            document.getElementById('nombres').value = '';
            document.getElementById('correo').value = '';
            document.getElementById('telefono').value = '';
        }); */

        function abrirModal(){
			document.getElementById('id_estudiante').value = '';
            document.getElementById('carrera').value = '';
            document.getElementById('documento').value = '';
            document.getElementById('nombres').value = '';
            document.getElementById('correo').value = '';
            document.getElementById('telefono').value = '';

            $('#modalcrud').modal('show');
		}
    </script>

    <?php include('jss.php'); ?>
</body>
</html>
<?php }else{ header('location:login.php'); } ?>