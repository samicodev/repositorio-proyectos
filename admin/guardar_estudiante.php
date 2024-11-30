<?php
include('db.php');

if (isset($_POST['btn_registrar'])) {

    // Variables recibidas del formulario
    $id_carrera = $_POST['id_carrera'];
    $documento = $_POST['documento'];
    $nombres = $_POST['nombres'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    
    if (!empty($_POST['id_estudiante'])) {
        // Si el campo 'id_estudiante' tiene un valor, actualiza el registro
        $id_estudiante = $_POST['id_estudiante'];
        $sql = $mbd->prepare("UPDATE estudiante SET id_carrera=:id_carrera, documento=:documento, nombres=:nombres, correo=:correo, telefono=:telefono WHERE id=:id_estudiante");
        $sql->execute([
            'id_carrera' => $id_carrera,
            'documento' => $documento,
            'nombres' => $nombres,
            'correo' => $correo,
            'telefono' => $telefono,
            'id_estudiante' => $id_estudiante
        ]);
    } else {
        // Si 'id_estudiante' está vacío, registra un nuevo estudiante
        $sql = $mbd->prepare("INSERT INTO estudiante (id_carrera, documento, nombres, correo, telefono) VALUES (:id_carrera, :documento, :nombres, :correo, :telefono)");
        $sql->execute([
            'id_carrera' => $id_carrera,
            'documento' => $documento,
            'nombres' => $nombres,
            'correo' => $correo,
            'telefono' => $telefono,
        ]);
    }

    header('Location: estudiantes.php');
}
?>
