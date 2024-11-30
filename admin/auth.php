<?php 
session_start();
include('db.php');

if (isset($_POST['usuario']) && isset($_POST['password'])) {
	$usu=$_POST['usuario'];
	$clave=md5($_POST['password']);
	$loged=0;
    foreach($mbd->query("SELECT * from usuario WHERE usuario='$usu' AND clave='$clave' ") as $fila) {
        if ($fila['usuario']==$usu && $fila['clave']==$clave) {
        	$_SESSION['login']=$fila['id'];
        	$_SESSION['nombres']=$fila['nombres'];
        	$_SESSION['rol']=$fila['rol'];
        	$loged=1;
        }
    }
  
    if ($loged==1) {
    	header('location:index.php');
    }else{
    	header('location:login.php');
    }


}else{
	header('location:login.php');
}

?>
