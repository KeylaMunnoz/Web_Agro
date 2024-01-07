<?php
include('../view/Plantilla.php');
include('../Config/Conexion.php');
$sql = "SELECT p.nombre, p.cantidad
        FROM productos p
        ORDER by p.cantidad DESC";
$resultado = mysqli_query($conexion, $sql);

//Crear objeto
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();

// Establecer el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Inventario', 0, 1, 'C'); // Título centrado
$pdf->Ln();

// Encabezado de la tabla
$pdf->Cell(50);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(90, 190, 245); // Establecer color de fondo a celeste claro
$pdf->SetTextColor(255); // Establecer color de texto a blanco
$pdf->Cell(45, 10, 'PRODUCTO', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(45, 10, 'CANTIDAD', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Ln();
 
// Contenido de la tabla
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetFillColor(255); // Restablecer color de fondo a valor predeterminado (blanco)
$pdf->SetTextColor(0); // Restablecer color de texto a valor predeterminado (negro)
while ($mostrar = mysqli_fetch_array($resultado)) {
    $pdf->Cell(50);
    $pdf->Cell(45, 10, $mostrar['nombre'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar['cantidad'], 1, 0, 'C');
    $pdf->Ln();
}

// Agregar la fecha al final del documento
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Fecha de descarga: ' . date('d-m-Y'), 0, 1, 'R');

// Guardar el PDF
$pdf->Output('D', 'Reporte_Inventario.pdf');
?>
