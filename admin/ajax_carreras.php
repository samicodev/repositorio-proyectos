<?php 
include('db.php');

$id_car=$_GET['id_carrera'];
$id_mod=$_GET['id_mod'];

$lista='<option value="">Seleccione...</option>';

foreach($mbd->query("SELECT * from carrera ORDER BY nombre ASC") as $fila) {
	if ($id_mod==6) {
		$lista.='<option value="'.$fila['id'].'">'.mb_strtoupper($fila["nombre"]).'</option>';
	}else{
		if ($fila['id']==$id_car) {
			$lista.='<option value="'.$fila['id'].'">'.mb_strtoupper($fila["nombre"]).'</option>';
		}
	}
}


$data=array('lista' =>$lista);
echo json_encode($data);

?>