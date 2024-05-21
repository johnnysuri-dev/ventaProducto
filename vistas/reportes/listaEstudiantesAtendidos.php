<?php

include ('cabeceraReportPdf.php'); 
require('../../clases/conexionConsulta.php'); 
//include('ConexionReport.php');

$id=$_REQUEST['ide'];

$query= "SELECT id_estudiante, nombres, apellidos, fechaNacimiento, genero, ci, direccion, conQuienVive, nacionalidad, id_cursos, id_usuario FROM estudiante";

$result= $conexion->query($query);

echo "$result";
$pdf = new PDF();
$pdf->AliasNbPages(); //Crea una alias page
$pdf->AddPage();//añade una nueva página

$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,10,'Lista de productos',0,1,'C');

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        // Apartir de aqui debe maquetar el encabezado de tabla
        $pdf->Cell(15,6,'ID',1,0,'C',1);
        $pdf->Cell(15,6,'IdCat',1,0,'C',1);
        $pdf->Cell(30,6,'nombre',1,0,'C',1);
        $pdf->Cell(50,6,'descripcion',1,0,'C',1);
        $pdf->Cell(20,6,'cantidad',1,0,'C',1);
        $pdf->Cell(25,6,'precio',1,0,'C',1);
        $pdf->Cell(30,6,'fecha',1,1,'C',1);
        // contenidos

$pdf->SetFont('Arial','',10);

while ($row = $result->fetch_assoc() ) {
         
        $pdf->Cell(15,6,$row['id_estudiante'],1,0,'C');
        $pdf->Cell(15,6,$row['nombres'],1,0,'C');
        $pdf->Cell(30,6,$row['apellidos'],1,0,'C');
        $pdf->Cell(50,6,$row['fechaNacimiento'],1,0,'C');
        $pdf->Cell(20,6,$row['ci'],1,0,'C');
        $pdf->Cell(25,6,$row['direccion'],1,0,'C');
        $pdf->Cell(30,6,$row['conQuienVive'],1,1,'C');
}



$pdf->Output();
?>