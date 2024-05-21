<?php

// hacemos la referencia al base de datos 
require('../../clases/conexionConsulta.php'); 

// esto lo hace es hacer la referencia la libreria fpdf
require('../../librerias/fpdf/fpdf.php');



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   $this->Image('../../img/ok.png',12,10,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
   

    $this->SetY(15);
    $this->SetTextColor(16,87,97);
    // Título
    $this-> Cell(0,5,'INFORME PSICOPEDAGOGICO',0,0,'C');
     $this->Ln();
     $this-> Cell(0,6,'AREA GABINETE PSICOPEDAGOGICO',0,0,'C');
     $this->Ln();
    $this->SetFont('Arial','B',12);
  $this->Cell(0,6,'COLEGIO ADVENTISTA SANTA CRUZ',0,0,'C');
    
    // Salto de línea
    $this->Ln(12);


}

// Pie de página-----------------------
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}


?>