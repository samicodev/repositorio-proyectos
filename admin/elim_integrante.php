<?php 
include('db.php');

if (isset($_GET['id'])) {

$id_integ=$_GET['id'];

$sql = $mbd->prepare("DELETE FROM integrantes WHERE id=$id_integ");
$sql->execute();

	header('location:trabajos.php');
}

?>
