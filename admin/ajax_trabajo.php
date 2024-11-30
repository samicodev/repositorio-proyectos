<?php 
include('db.php');

$idtrabajo=$_POST['idtrabajo'];

$sql = "SELECT * FROM trabajos WHERE id = :id";
$stmt = $mbd->prepare($sql);
$stmt->bindParam(':id', $idtrabajo);
$stmt->execute();


$resultado = $stmt->fetch(PDO::FETCH_ASSOC);


echo json_encode($resultado);

?>