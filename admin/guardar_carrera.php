<?php 
include('db.php');

if (isset($_POST['btn_registrar'])) {


	$nombre=$_POST['nombre'];

    $sql = $mbd->prepare("INSERT INTO carrera (nombre)
          VALUES (:nombre)");
 
      $sql->execute([
          'nombre' => $nombre,
      ]);


	header('location:carreras.php');
}

?>
