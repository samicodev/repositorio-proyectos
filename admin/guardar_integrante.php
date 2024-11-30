<?php 
include('db.php');

if (isset($_POST['btn_registrar'])) {


$v_id_proyecto=$_POST['id_proy'];
$v_id_estudiante=$_POST['id_estudiante'];
$v_nota=$_POST['nota'];
$v_observacion=$v_nota<=60 ? 'DESAPROBADO' : 'APROBADO';

$count=0;
foreach($mbd->query("SELECT * FROM integrantes WHERE id_proyecto=$v_id_proyecto AND id_estudiante=$v_id_estudiante ") as $fila) { 
  if ($fila['id_estudiante']==$v_id_estudiante) { $count=1; }
}

  if ($count==0) {
    $sql = $mbd->prepare("INSERT INTO integrantes (id_proyecto,id_estudiante,nota,observacion)
          VALUES (:id_proyecto,:id_estudiante,:nota,:observacion)");
 
      $sql->execute([
          'id_proyecto' => $v_id_proyecto,
          'id_estudiante' => $v_id_estudiante,
          'nota' => $v_nota,
          'observacion' => $v_observacion,
      ]);
  }



	header('location:trabajos.php');
}

?>
