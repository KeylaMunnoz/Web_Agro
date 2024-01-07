<?php
include('../view/Plantilla4.php');
include('../Config/Conexion.php');
$sql = "SELECT r.idReserva, c.nombre AS nombreCliente, c.apellido, c.correo, p.nombre AS nombreProducto, p.precio, r.cantidad
        FROM reserva r
        INNER JOIN cliente c ON r.cliente = c.correo
        INNER JOIN productos p ON r.producto = p.idProducto";
$resultado = mysqli_query($conexion, $sql);

//Crear objeto
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();

// Establecer el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte con detalle de reservas existentes.', 0, 1, 'C'); // Título centrado
$pdf->Ln();

// Encabezado de la tabla
 
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(90, 190, 245); // Establecer color de fondo a celeste claro
$pdf->SetTextColor(255); // Establecer color de texto a blanco
$pdf->Cell(30, 10, 'ID RESERVA', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(40, 10, 'CLIENTE', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(60, 10, 'PRODUCTO', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(30, 10, 'CANTIDAD', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(30, 10, 'PRECIO', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Ln();
 
// Contenido de la tabla
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetFillColor(255); // Restablecer color de fondo a valor predeterminado (blanco)
$pdf->SetTextColor(0); // Restablecer color de texto a valor predeterminado (negro)
while ($mostrar = mysqli_fetch_array($resultado)) {
  
    $pdf->Cell(30, 10, $mostrar['idReserva'], 1, 0, 'C');
    $pdf->Cell(40, 10, $mostrar['nombreCliente'] . ' ' . $mostrar['apellido'], 1, 0, 'L');
    $pdf->Cell(60, 10, $mostrar['nombreProducto'], 1, 0, 'L');
    $pdf->Cell(30, 10, $mostrar['cantidad'], 1, 0, 'C');
    $pdf->Cell(30, 10, '$' . number_format($mostrar['precio'], 2), 1, 0, 'R');
    $pdf->Ln();
    
}

// Agregar la fecha al final del documento
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Fecha de descarga: ' . date('d-m-Y'), 0, 1, 'R');

// Guardar el PDF
$pdf->Output('D', 'Reporte_Reservas_Detalle.pdf');
?>
