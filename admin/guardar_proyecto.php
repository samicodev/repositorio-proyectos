<?php 
include('db.php');

if (isset($_POST['btn_guardar'])) {

    $fileTmpPath = $_FILES['archivo']['tmp_name'];
    $fileName = $_FILES['archivo']['name'];
    $fileType = $_FILES['archivo']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    /* $newFileName = md5(time()) . '.' . $fileExtension; */
    $newFileName = md5(time());

    $uploadFileDir = '../docs/';
    $dest_path = $uploadFileDir . $newFileName . '.' . $fileExtension;

    $cod = $_POST['cod']; // Código a validar
    $id_trabajo = !empty($_POST['id_trabajo']) ? $_POST['id_trabajo'] : '';

    // Validación de código existente
    if ($id_trabajo == '') {
        // Para un nuevo trabajo (insert)
        $sql = "SELECT * FROM trabajos WHERE cod = :codigo AND id <> 0";
        $stmt = $mbd->prepare($sql);
        $stmt->bindParam(':codigo', $cod);
        $stmt->execute();
    } else {
        // Para la actualización (update)
        $sql = "SELECT * FROM trabajos WHERE cod = :codigo AND id <> :idtrabajo";
        $stmt = $mbd->prepare($sql);
        $stmt->bindParam(':codigo', $cod);
        $stmt->bindParam(':idtrabajo', $id_trabajo);
        $stmt->execute();
    }

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        // Si el código ya existe, no se permite continuar
        header('location:trabajos.php?status=error');
        exit;
    } else {
        // Si no existe, continuar con la inserción o actualización
        if (!empty($id_trabajo)) {
            move_uploaded_file($fileTmpPath, $dest_path);
            // Si el campo 'id_trabajo' tiene un valor, actualiza el registro
            $sql = $mbd->prepare("UPDATE trabajos SET id_modalidad=:id_modalidad,id_carrera=:id_carrera,cod=:cod,titulo=:titulo, descripcion=:descripcion,archivo=:archivo, anio=:anio WHERE id=:id_trabajo");
            $sql->execute([
                'id_modalidad' => $_POST['modalidad'],
                'id_carrera' => $_POST['carrera_id'],
                'cod' => $_POST['cod'],
                'titulo' => $_POST['titulo'],
                'descripcion' => $_POST['descripcion'],
                'archivo' => $newFileName,
                'anio' => $_POST['anio'],
                'id_trabajo' => $id_trabajo
            ]);

        } else {
            // Insertar un nuevo registro
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $id_carrera = $_POST['carrera_id'] != '' ? $_POST['carrera_id'] : '0';
                $sql = $mbd->prepare("INSERT INTO trabajos (id_modalidad,id_carrera,cod,titulo,descripcion,archivo,fecha,anio)
                    VALUES (:id_modalidad,:id_carrera,:cod,:titulo,:descripcion,:archivo,:fecha,:anio)");
                $sql->execute([
                    'id_modalidad' => $_POST['modalidad'],
                    'id_carrera' => $id_carrera,
                    'cod' => $cod,
                    'titulo' => $_POST['titulo'],
                    'descripcion' => $_POST['descripcion'],
                    'archivo' => $newFileName,
                    'fecha' => date('Y-m-d'),
                    'anio' => $_POST['anio'],
                ]);
            }
        }

        header('location:trabajos.php');
    }
}
?>
