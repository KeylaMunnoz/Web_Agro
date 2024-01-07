<?php
include('../view/Plantilla4.php');
include('../Config/Conexion.php');

$sql = "SELECT correo, nombre, apellido, telefono 
FROM cliente
WHERE correo not like '%@agromarket.com'";
$resultado = mysqli_query($conexion, $sql);

//Crear objeto
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();

// Establecer el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de contacto de clientes', 0, 1, 'C'); // Título centrado
$pdf->Ln();

// Encabezado de la tabla
 
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(90, 190, 245); // Establecer color de fondo a celeste claro
$pdf->SetTextColor(255); // Establecer color de texto a blanco
$pdf->Cell(80, 10, 'CORREO', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(40, 10, 'NOMBRE', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(40, 10, 'APELLIDO', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(30, 10, 'TELEFONO', 1, 1, 'C', 1); // Cabecera centrada con color de fondo

 
 
// Contenido de la tabla
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetFillColor(255); // Restablecer color de fondo a valor predeterminado (blanco)
$pdf->SetTextColor(0); // Restablecer color de texto a valor predeterminado (negro)
while ($mostrar = mysqli_fetch_array($resultado)) {
 
    $pdf->Cell(80, 10, $mostrar['correo'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar['nombre'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar['apellido'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['telefono'], 1, 0, 'C');

    $pdf->Ln();
}

// Agregar la fecha al final del documento
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Fecha de descarga: ' . date('d-m-Y'), 0, 1, 'R');

// Guardar el PDF
$pdf->Output('D', 'Reporte_Contacto_Cliente.pdf');
?>
