<?php
include('../view/Plantilla3.php');
include('../Config/Conexion.php');
$sql = "SELECT r.idReserva, SUM(r.cantidad) as cantidad, SUM(r.cantidad*p.precio) as total_reserva  
        FROM productos p join reserva r 
        on p.idProducto=r.producto
        group by r.idReserva";

$sql2= "SELECT  SUM(rs.cantidad*pr.precio) as total  
        FROM productos pr join reserva rs 
        on pr.idProducto=rs.producto";
$resultado = mysqli_query($conexion, $sql);
$resultado2 = mysqli_query($conexion, $sql2);
//Crear objeto
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();

// Establecer el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de ingresos por reservas y total de ingresos', 0, 1, 'C'); // Título centrado
$pdf->Ln();

// Encabezado de la tabla
$pdf->Cell(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(90, 190, 245); // Establecer color de fondo a celeste claro
$pdf->SetTextColor(255); // Establecer color de texto a blanco
$pdf->Cell(45, 10, 'ID', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(45, 10, 'CANTIDAD', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Cell(85, 10, 'PRECIO TOTAL DE RESERVA', 1, 0, 'C', 1); // Cabecera centrada con color de fondo
$pdf->Ln();
 
// Contenido de la tabla
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetFillColor(255); // Restablecer color de fondo a valor predeterminado (blanco)
$pdf->SetTextColor(0); // Restablecer color de texto a valor predeterminado (negro)
while ($mostrar = mysqli_fetch_array($resultado)) {
    $pdf->Cell(10);
    $pdf->Cell(45, 10, $mostrar['idReserva'], 1, 0, 'C');
    $pdf->Cell(45, 10, $mostrar['cantidad'], 1, 0, 'C');
    $pdf->Cell(85, 10, $mostrar['total_reserva'], 1, 0, 'C');
    $pdf->Ln();
}

while ($mostrar2 = mysqli_fetch_array($resultado2)) {
    $pdf->Cell(10);
    $pdf->Cell(90, 10, "TOTAL DE INGRESOS", 1, 0, 'C');
    $pdf->Cell(85, 10, $mostrar2['total'], 1, 0, 'C');
     
    $pdf->Ln();
}

// Agregar la fecha al final del documento
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Fecha de descarga: ' . date('d-m-Y'), 0, 1, 'R');

// Guardar el PDF
$pdf->Output('D', 'Reporte_Ingresos_Reservas.pdf');
?>
