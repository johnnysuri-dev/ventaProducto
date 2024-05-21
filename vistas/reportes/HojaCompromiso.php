<?php

include ('cabeceraReportPdf.php'); 
require('../../clases/conexionConsulta.php'); 
//include('ConexionReport.php');

$id=$_REQUEST['ide'];

//$query= "SELECT id_estudiante, nombres, apellidos, fechaNacimiento, genero, ci, direccion, conQuienVive, nacionalidad, id_cursos, id_usuario FROM estudiante where id_estudiante=$id";

$query= "SELECT E.id_estudiante, E.nombres, E.apellidos, E.fechaNacimiento, E.genero, E.ci, E.direccion, E.conQuienVive, E.nacionalidad, E.id_cursos, E.id_usuario, ev.id_estudiante, ev.estado, ev.title, ev.start, en.Datos_Clinicos, en.desarrollo_Cognitivo, en.motricidad_Gruesa, en.motricidad_Fina, en.desarrollo_Sensorial, en.comunicacion_Linguistico, en.desarrollo_Social_Afectivo, en.observaciones, en.compromiso, d.tutorPadre, d.tutorMadre, d.telefono1, d.telefono2
        FROM estudiante AS E 
        INNER JOIN datosfamilia as d ON d.id_estudiante = E.id_estudiante
        INNER JOIN events as ev ON E.id_estudiante= ev.id_estudiante 
        INNER JOIN entrevista2 as en on E.id_estudiante= en.id_estudiante 
        WHERE E.id_estudiante=$id";
$result= $conexion->query($query);


$pdf = new PDF();
$pdf->AliasNbPages(); //Crea una alias page
$pdf->AddPage();//añade una nueva página



$pdf->SetFont('Arial','B',15);
$pdf->Cell(180,10,'HOJA DE COMPROMISO',0,1,'C'); // la linea
$pdf->Line(180,$pdf->GetY() + 10, 25, $pdf->GetY() +10);
$pdf->Ln(3);

$pdf->SetMargins(20,35,20,35);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,10,'DATOS PERSONALES DEL ESTUDIANTE',0,1,'C');





// me falta añadir  una tabla en 
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
        $pdf->Cell(30,6,'Con QuienVive',0,0,'C',1); 
        $pdf->Cell(30,6,'Nacionalidad',0,0,'C',1); 
        $pdf->Cell(40,6,'Id_cursos',0,0,'C',1);


        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10); 
        $pdf->Cell(30,6,$row['ci'],0,0,'C');
        $pdf->Cell(50,6,$row['direccion'],0,0,'C');
        $pdf->Cell(30,6,$row['conQuienVive'],0,0,'C');
        $pdf->Cell(30,6,$row['nacionalidad'],0,0,'C');
        $pdf->Cell(40,6,$row['id_cursos'],0,1,'C');
        $pdf->Ln(6);
        /////////////////////////////////////////////

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(180,6,'Compromiso padre de familia',0,0,'C',1);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->write(5,'Yo : ',0,0,'');
        $pdf->write(5, utf8_decode($row['tutorPadre']),0,0,'L',1);   
        $pdf->write(5,',   ',0,0,''); 
        $pdf->write(5, utf8_decode($row['tutorMadre']),0,0,'L',1);
       
        $pdf->Ln(6);

        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFont('Arial','',10);
        $pdf->write(5,'Consciente de que el aprendizaje de mi hijo/a implica el apoyo y seguimiento familiar me comprometo a dar cumplimento a las siguientes indicaciones ',0,0,'J');
        $pdf->Ln(6);
//////////////////////////////////
        // Set font

///////////////
        $pdf->SetFont('Arial','I',10);
        $pdf->write(5, utf8_decode('-     Velar  para que mi hijo/a cumpla las tareas asignadas en aula y las actividades extracurriculares según el plan de clase del docente'),0,0,'L',1);
        $pdf->Ln(6);
        $pdf->write(5,utf8_decode('-     Ayudar a mi  hijo/a organizar el tiempo de estudio en casa para que realice las tareas encomendadas por los docentes'),0,0,'L',1);
        $pdf->Ln(6);
        $pdf->write(5,utf8_decode('-     Velar a que mi hijo (a) cumpla con horarios establecidos de clase  y cualquier ausencia hacer conocer a los medios correspondientes'),0,0,'L',1);
        $pdf->Ln(6);
        $pdf->write(5,utf8_decode('-     Verificar un día antes el material que llevará mi hijo/a  según el horario establecido de su respectivo curso'),0,0,'L',1);
        $pdf->Ln(6);
        $pdf->write(5,utf8_decode('-     Escuchar siempre a mi hijo para conocer los problemas  o éxitos que quiera compartir'),0,0,'L',1);
        $pdf->Ln(6);
        $pdf->write(5,utf8_decode('-     Expresar a mi hijos cariño, afecto tanto verbal como físico'),0,0,'L',1);
         $pdf->Ln(6);
        $pdf->write(5,utf8_decode('-     Valorar siempre el esfuerzo y la superación de dificultades y limitaciones en su trabajo'),0,0,'L',1);
        $pdf->Ln(6);

 $pdf->write(5,'Me comprometo: ......................................................................................................................................................',0,0,'J');
 $pdf->write(5,'......................................................................................................................................................',0,0,'J');
         /////////////////////////////


        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->write(5,utf8_decode('Firmo la presente para hacer cumplir todos los puntos mencionados en el presente documento por el bienestar de mi hijo/a en su proceso de enseñanza aprendizaje.'),0,0,'J');


        $pdf->Ln(40);
        $pdf->SetFont('Arial','B', 8);
        $pdf->Cell(100,5,'Firma Psicopedagoga',0,0,'');
        $pdf->SetFont('Arial','B', 8);
        $pdf->Cell(70,5,'Firma del padre/madre o tutor',0,0,'');
        
        $pdf->Ln();
        $pdf->SetY(-15);

}



$pdf->Output();
?>