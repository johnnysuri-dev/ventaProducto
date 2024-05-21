<?php

include ('cabeceraReportPdf.php'); 
require('../../clases/conexionConsulta.php'); 
//include('ConexionReport.php');

$id=$_REQUEST['ide'];

//$query= "SELECT id_estudiante, nombres, apellidos, fechaNacimiento, genero, ci, direccion, conQuienVive, nacionalidad, id_cursos, id_usuario FROM estudiante where id_estudiante=$id";

//$query= " SELECT E.id_estudiante, E.nombres, E.apellidos, E.fechaNacimiento, E.genero, E.ci, E.direccion, E.conQuienVive, E.nacionalidad, E.id_cursos, E.id_usuario, EN.Datos_Clinicos, EN.desarrollo_Cognitivo, EN.motricidad_Gruesa, EN.motricidad_Fina, EN.desarrollo_Sensorial, EN.comunicacion_Linguistico, EN.desarrollo_Social_Afectivo, EN.estilo_Aprendizaje, EN.motivacion FROM estudiante AS E INNER JOIN entrevista2 AS EN ON E.id_estudiante=EN.id_estudiante  where E.id_estudiante=$id";
//$query= "SELECT D.tutorPadre, D.tutorMadre, E.id_estudiante, E.nombres, E.apellidos, E.fechaNacimiento, E.genero, E.ci, E.direccion, E.conQuienVive, E.nacionalidad, E.id_cursos, E.id_usuario, EN.Datos_Clinicos, EN.desarrollo_Cognitivo, EN.motricidad_Gruesa, EN.motricidad_Fina, EN.desarrollo_Sensorial, EN.comunicacion_Linguistico, EN.desarrollo_Social_Afectivo, EN.observaciones, EN.compromiso FROM estudiante AS E INNER JOIN entrevista2 AS EN ON E.id_estudiante=EN.id_estudiante INNER JOIN datosfamilia AS D ON E.id_estudiante= D.id_estudiante where E.id_estudiante=$id";

//esto si funciona,.......................................
//$query= "SELECT  E.id_estudiante, E.nombres, E.apellidos, E.fechaNacimiento, E.genero, E.ci, E.direccion, E.conQuienVive, E.nacionalidad, E.id_cursos, E.id_usuario,  ev.id_estudiante, ev.estado, ev.title, ev.start FROM estudiante AS E INNER JOIN events as ev ON E.id_estudiante= ev.id_estudiante WHERE E.id_estudiante=104";

//$query= "SELECT da.tutorPadre, da.tutorMadre, E.id_estudiante, E.nombres, E.apellidos, E.fechaNacimiento, E.genero, E.ci, E.direccion, E.conQuienVive, E.nacionalidad, E.id_cursos, E.id_usuario, EN.Datos_Clinicos, EN.desarrollo_Cognitivo, EN.motricidad_Gruesa, EN.motricidad_Fina, EN.desarrollo_Sensorial, EN.comunicacion_Linguistico, EN.desarrollo_Social_Afectivo, EN.observaciones, EN.compromiso FROM estudiante AS E INNER JOIN entrevista2 AS en ON E.id_estudiante= en.id_estudiante INNER JOIN events as ev ON E.id_estudiante= ev.id_estudiante INNER JOIN datosfamilia as da ON E.id_estudiante= da.id_estudiante WHERE E.id_estudiante=$id";
$query= "SELECT E.id_estudiante, E.nombres, E.apellidos, E.fechaNacimiento, E.genero, E.ci, E.direccion, E.conQuienVive, E.nacionalidad, E.id_cursos, E.id_usuario, ev.id_estudiante, ev.estado, ev.title, ev.start, en.Datos_Clinicos, en.desarrollo_Cognitivo, en.motricidad_Gruesa, en.motricidad_Fina, en.desarrollo_Sensorial, en.comunicacion_Linguistico, en.desarrollo_Social_Afectivo, en.observaciones, en.compromiso FROM estudiante AS E INNER JOIN events as ev ON E.id_estudiante= ev.id_estudiante INNER JOIN entrevista2 as en on E.id_estudiante= en.id_estudiante WHERE E.id_estudiante=$id";

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
        $pdf->Cell(50,6,'Direccion',0,0,'C',1); 
        $pdf->Cell(30,6,'Con Quien Vive',0,0,'C',1); 
        $pdf->Cell(30,6,'Nacionalidad',0,0,'C',1); 
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
        /////////////////////////////////////////////
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(180,10,'VALORACION DE ENTREVISTA',0,1,'C');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Datos clinicos',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->write(6,utf8_decode($row['Datos_Clinicos']),0,0,'C');
        $pdf->Ln(6);
        ///////////////////////////////////////////////
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Desarrollo cognitivo',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->write(6,utf8_decode($row['desarrollo_Cognitivo']),0,0,'C');
      
        //$pdf->Cell(100, 5, utf8_decode($row['desarrollo_Cognitivo']), 0, 0, 'L');
        //$pdf->Write(5, utf8_decode($row['desarrollo_Cognitivo']));
        //$pdf->MultiCell(165, 5, utf8_decode($row['desarrollo_Cognitivo']), 0, 1,);
        $pdf->Ln(6);
        ///////////////////////////////////////////
         $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Desarrollo motor',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(180,6,'Motricidad gruesa',0,1,'L');
        $pdf->SetFont('Arial','',10); 
        $pdf->write(6,utf8_decode($row['motricidad_Gruesa']),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(180,6,'Motricidad fina',0,1,'L');
        $pdf->SetFont('Arial','',10); 
         $pdf->write(6,utf8_decode($row['motricidad_Fina']),0,0,'C');
        $pdf->Ln(6);

        //////////////////////////////////////////
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Desarrollo sensorial',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->write(6,utf8_decode($row['desarrollo_Sensorial']),0,0,'J');
        $pdf->Ln(6);
        //////////////////////////////////////////
         $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Desarrollo comunicativo y linguistico',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->write(5,utf8_decode($row['comunicacion_Linguistico']),0,0,'j');
        $pdf->Ln(6);
        /////////////////////////////////////////
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Desarrollo social y afectivo',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->write(6,utf8_decode($row['desarrollo_Social_Afectivo']),0,0,'J');
        $pdf->Ln(10);
        /////////////////////////////////////
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Observaciones',0,0,'L',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->write(6,utf8_decode($row['observaciones']),0,0,'J');
        $pdf->Ln(6);

}



$pdf->Output();
?>