<?php 
include('db.php');

if (isset($_GET['id'])) {

$id_integ=$_GET['id'];

$sql = $mbd->prepare("DELETE FROM usuario WHERE id=$id_integ");
$sql->execute();

	header('location:usuarios.php');
}

?>
