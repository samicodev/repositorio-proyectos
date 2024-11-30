<?php 
include('db.php');

$id_car=$_GET['id_carrera'];
$lista='<option value="">Seleccione...</option>';

foreach($mbd->query("SELECT et.*, ca.nombre as carre from estudiante as et, carrera as ca WHERE et.id_carrera=ca.id AND et.id NOT IN (SELECT id_estudiante from integrantes) AND ca.id=".$id_car) as $fila) {
	$lista.='<option value="'.$fila['id'].'">'.mb_strtoupper($fila["nombres"]).'</option>';
}


$data=array('lista' =>$lista);
echo json_encode($data);

?>