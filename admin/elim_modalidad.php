<?php 
include('db.php');

if (isset($_GET['id'])) {

$id_integ=$_GET['id'];

$sql = $mbd->prepare("DELETE FROM modalidad WHERE id=$id_integ");
$sql->execute();

	header('location:modalidades.php');
}

?>
