<?php
require('../fpdf/fpdf.php');
include('db.php');
include '../phpqrcode/qrlib.php'; // Biblioteca QR

// Crear una nueva instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Consultar todos los códigos de proyectos
$sql = "SELECT cod, archivo FROM trabajos";
$stmt = $mbd->prepare($sql);
$stmt->execute();

// Verificar si se encontraron resultados
if ($stmt->rowCount() > 0) {
    $trabajos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Definir número de QR por página y posiciones
    $qrPerPage = 20;  // 20 QR por página
    $qrSize = 30;     // Tamaño del QR
    $marginX = 10;
    $marginY = 10;
    $posX = $marginX;
    $posY = $marginY;
    $qrCount = 0;

    foreach ($trabajos as $trabajo) {
        $cod = $trabajo['cod'];
        $pdfArchivo = $trabajo['archivo'];

        // Especificar el contenido del código QR
        $contenidoQR = 'https://mediumpurple-ibis-157409.hostingersite.com/pdf-viewer/pdf.php?view=' . $pdfArchivo;

        // Nombre del archivo QR temporal
        $archivoQR = 'Codigo_' . $cod . '.png';

        // Generar el código QR
        QRcode::png($contenidoQR, $archivoQR, 'L', 10, 2);

        // Añadir el QR al PDF
        $pdf->Image($archivoQR, $posX, $posY, $qrSize, $qrSize);  

        // Añadir el texto debajo del QR
        $pdf->SetXY($posX, $posY + $qrSize + 5);  // Ajustar la posición del texto debajo del QR
        $pdf->Cell($qrSize, 10, utf8_decode("Código: $cod"), 0, 0, 'C');

        // Eliminar el archivo QR temporal
        unlink($archivoQR);

        // Cambiar la posición para el siguiente QR
        $qrCount++;
        if ($qrCount % 4 == 0) {
            // Mover a la siguiente fila
            $posX = $marginX;
            $posY += $qrSize + 20;  // Incrementar posición Y para evitar solapamiento
        } else {
            // Mover a la siguiente columna
            $posX += ($pdf->GetPageWidth() - 2 * $marginX) / 4; // 4 QR por fila
        }

        // Si hemos agregado 20 QR, agregar una nueva página
        if ($qrCount == $qrPerPage) {
            $pdf->AddPage();
            $posX = $marginX;
            $posY = $marginY;
            $qrCount = 0;
        }
    }

    // Generar un nombre único para el archivo PDF
    $pdfFolder = '../pdfs_generados/';
    $timestamp = time(); // Sello de tiempo único
    $pdfFilename = $pdfFolder . "Codigos_QR_Proyectos_$timestamp.pdf";

    // Guardar el archivo PDF en el servidor
    $pdf->Output('F', $pdfFilename);

    // Enviar la ruta del PDF para descargarlo o abrirlo
    echo json_encode(['pdfFile' => $pdfFilename]);
    exit;

} else {
    die(json_encode(['error' => "No se encontraron archivos de trabajos en la base de datos."]));
}
?>
