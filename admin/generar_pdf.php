<?php
require('../fpdf/fpdf.php');
include('db.php');

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    // Configura la conexión para que use UTF-8
    $mbd->exec("SET NAMES 'utf8'");

    // Consulta SQL para obtener los datos del proyecto y los nombres de los estudiantes
    $query = $mbd->prepare("SELECT t.titulo, t.cod, t.anio, mo.nombre AS modalidad, ca.nombre AS carrera, GROUP_CONCAT(et.nombres SEPARATOR ', ') AS estudiantes 
                            FROM trabajos t
                            JOIN modalidad mo ON t.id_modalidad = mo.id
                            JOIN carrera ca ON t.id_carrera = ca.id
                            JOIN integrantes i ON i.id_proyecto = t.id
                            JOIN estudiante et ON i.id_estudiante = et.id
                            WHERE t.id = :id_proyecto
                            GROUP BY t.titulo, t.cod, t.anio, mo.nombre, ca.nombre");
    $query->bindParam(':id_proyecto', $id_proyecto, PDO::PARAM_INT);
    $query->execute();

    $project = $query->fetch(PDO::FETCH_ASSOC);

    if ($project) {
        // Crear el PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Configura la fuente y el título del documento
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Certificacion del documento de graduacion del estudiante'), 0, 1, 'C');
        $pdf->Ln(10);

        // Agregar información al PDF
        $pdf->SetFont('Arial', '', 12);

          // Mostrar el encabezado de los nombres de estudiantes
        $pdf->Cell(50, 10, utf8_decode('Nombres:'), 0, 0,);

        // Formateo de los nombres de estudiantes en líneas separadas
        $nombres_estudiantes = explode(', ', $project['estudiantes']);
        
        // Alinear y mostrar el primer nombre
        $pdf->Cell(0, 10, utf8_decode($nombres_estudiantes[0]), 0, 1,);

        // Si hay más de un estudiante, mostrar el siguiente en una nueva línea alineado al centro
        if (count($nombres_estudiantes) > 1) {
            $pdf->Cell(0, 10, utf8_decode($nombres_estudiantes[1]), 0, 1,'C'); // Alinear al centro
        }

        $pdf->Cell(50, 10, utf8_decode('Carrera:'), 0, 0);
        $pdf->Cell(0, 10, utf8_decode($project['carrera']), 0, 1);

        $pdf->Cell(50, 10, utf8_decode('Modalidad Elegida:'), 0, 0);
        $pdf->Cell(0, 10, utf8_decode($project['modalidad']), 0, 1);

        $pdf->Cell(50, 10, utf8_decode('Título del Proyecto:'), 0, 0);
        $pdf->MultiCell(0, 10, utf8_decode($project['titulo']));

        $pdf->Cell(50, 10, utf8_decode('Año:'), 0, 0);
        $pdf->Cell(0, 10, $project['anio'], 0, 1);

        $pdf->Cell(50, 10, utf8_decode('Código:'), 0, 0);
        $pdf->Cell(0, 10, $project['cod'], 0, 1);

        // Salida del PDF
        $pdf->Output('D', 'Proyecto_' . $project['cod'] . '.pdf');
    } else {
        echo "No se encontraron datos para el proyecto.";
    }
}
?>
