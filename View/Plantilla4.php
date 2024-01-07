<?php
    require('../fpdf186/fpdf.php');

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('https://png.pngtree.com/template/20190927/ourlarge/pngtree-leaf---nature-icon-logo-vector-image_310495.jpg',10,8,33);
        $this->Image('../img/logoReporte.jpeg',170,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        
        $this->Cell(100,10,'AGROMARKET',1,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }

?>