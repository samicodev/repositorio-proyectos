<?php 
include('db.php');

if (isset($_POST['btn_registrar'])) {










$rol=$_POST['rol'];
$nombres=$_POST['nombres'];
$usuario=$_POST['usuario'];
$clave=md5($_POST['clave']);
$telefono=$_POST['telefono']!='' ? $_POST['telefono'] : '';


    $sql = $mbd->prepare("INSERT INTO usuario (rol,nombres,usuario,clave,telefono,estado)
          VALUES (:rol,:nombres,:usuario,:clave,:telefono,:estado)");
 
      $sql->execute([
          'rol' => $rol,
          'nombres' => $nombres,
          'usuario' => $usuario,
          'clave' => $clave,
          'telefono' => $telefono,
          'estado'=>1,
      ]);


	header('location:usuarios.php');
}

?>
