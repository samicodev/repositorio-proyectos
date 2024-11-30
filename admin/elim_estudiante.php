<?php 
include('db.php');

if (isset($_GET['id'])) {

$id_integ=$_GET['id'];

$sql = $mbd->prepare("DELETE FROM estudiante WHERE id=$id_integ");
$sql->execute();

	header('location:estudiantes.php');
}

?>
