<?php

include ('cabeceraReportPdf.php'); 
require('../../clases/conexionConsulta.php'); 
//include('ConexionReport.php');

$id=$_REQUEST['ide'];

$query= "SELECT id_estudiante, nombres, apellidos, fechaNacimiento, genero, ci, direccion, conQuienVive, nacionalidad, id_cursos, id_usuario FROM estudiante where id_estudiante=$id";
$result= $conexion->query($query);

$pdf = new PDF();
$pdf->AliasNbPages(); //Crea una alias page
$pdf->AddPage();//añade una nueva página
$pdf->SetMargins(20,35,20,20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,10,'DATOS PERSONALES',0,1,'C');

        



while ($row = $result->fetch_assoc() ) {

  $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',11);
        // Apartir de aqui debe maquetar el encabezado de tabla
        $pdf->Cell(10,6,'ID',0,0,'C',1);
        $pdf->Cell(50,6,'Nombres',0,0,'C',1);
        $pdf->Cell(50,6,'Apellidos',0,0,'C',1);
        $pdf->Cell(30,6,'F. Nacimiento',0,0,'C',1);
        $pdf->Cell(40,6,'Genero',0,0,'C',1);
        $pdf->Ln(6);

        $pdf->SetFont('Arial','',10); 
        $pdf->Cell(10,6,$row['id_estudiante'],0,0,'C');
        $pdf->Cell(50,6,$row['nombres'],0,0,'C');
        $pdf->Cell(50,6,$row['apellidos'],0,0,'C');
        $pdf->Cell(30,6,$row['fechaNacimiento'],0,0,'C');
        $pdf->Cell(40,6,$row['genero'],0,0,'C');
        $pdf->Ln(6);

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(30,6,'Ci',0,0,'C',1); 
        $pdf->Cell(50,6,'direccion',0,0,'C',1); 
        $pdf->Cell(30,6,'conQuienVive',0,0,'C',1); 
        $pdf->Cell(30,6,'nacionalidad',0,0,'C',1); 
        $pdf->Cell(40,6,'id_cursos',0,0,'C',1);
        //$pdf->Cell(40,6,'id_cursos',1,1,'C',1); el uno para abajo
        // contenidos
      
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->Cell(30,6,$row['ci'],0,0,'C');
        $pdf->Cell(50,6,$row['direccion'],0,0,'C');
        $pdf->Cell(30,6,$row['conQuienVive'],0,0,'C');
        $pdf->Cell(30,6,$row['nacionalidad'],0,0,'C');
        $pdf->Cell(40,6,$row['id_cursos'],0,1,'C');
        $pdf->Ln(6);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(180,10,'VALORACION DE ENTREVISTA',0,1,'C');

}



$pdf->Output();
?>