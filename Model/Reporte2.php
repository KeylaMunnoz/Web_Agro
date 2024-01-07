<?php
include('../view/Plantilla2.php');
include('../Config/Conexion.php');
$sql = "SELECT c.nombre, c.apellido, COUNT(r.cliente) as Cantidad_de_reservas FROM cliente c join reserva r 
        on c.correo = r.cliente
        Group by c.correo";
$resultado = mysqli_query($conexion, $sql);

//Crear objeto
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();

// Establecer el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de reservas totales realizadas por cliente', 0, 1, 'C'); // Título centrado
$pdf->Ln();

// Encabezado de la tabla
$pdf->Cell(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(90, 190, 245); // Establecer color de fondo a celeste claro
$pdf->SetTextColor(255); // Establecer color de texto a blanco
$pdf->Cell(45, 10, 'NOMBRE', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(45, 10, 'APELLIDO', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(85, 10, ' CANTIDAD DE RESERVAS REALIZADAS', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Ln();
 
// Contenido de la tabla
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetFillColor(255); // Restablecer color de fondo a valor predeterminado (blanco)
$pdf->SetTextColor(0); // Restablecer color de texto a valor predeterminado (negro)
while ($mostrar = mysqli_fetch_array($resultado)) {
    $pdf->Cell(10);
    $pdf->Cell(45, 10, $mostrar['nombre'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar['apellido'], 1, 0, 'C');
    $pdf->Cell(85, 10, $mostrar['Cantidad_de_reservas'], 1, 0, 'C');
    
    $pdf->Ln();
}

// Agregar la fecha al final del documento
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Fecha de descarga: ' . date('d-m-Y'), 0, 1, 'R');

// Guardar el PDF
$pdf->Output('D', 'Reporte_ReservasTotales_Cliente.pdf');
?>
