<?php 
include('db.php');

if (isset($_POST['btn_registrar'])) {


	$nombre=$_POST['nombre'];

    $sql = $mbd->prepare("INSERT INTO modalidad (nombre)
          VALUES (:nombre)");
 
      $sql->execute([
          'nombre' => $nombre,
      ]);


	header('location:modalidades.php');
}

?>
