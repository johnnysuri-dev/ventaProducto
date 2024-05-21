<?php
include('ConexionReport.php');
require('../../librerias/fpdf/fpdf.php');

$id=$_REQUEST['ide'];
//echo "$id";
//$query="SELECT `codigoRude`, estudiante.nombre, estudiante.apellidoP, estudiante.apellidoM, estudiante.identificacion, estudiante.CI, estudiante.fechaN, estudiante.sexo, estudiante.idiomaP, estudiante.idiomaA, estudiante.codigoP, estudiante.codigoD, estudiante.provinciaN, estudiante.localidadN, estudiante.provinciaV, estudiante.municipioV, estudiante.localidadV, estudiante.zonaV, estudiante.numeroV,`gestion`, grado.grado,unidad_e.nombreU, `idAspecto` FROM `matricula` 
//INNER JOIN `estudiante` ON matricula.codigoRude= estudiante.codigoR 
//INNER JOIN `unidad_e` ON matricula.unidadL= unidad_e.codigoSie 
//INNER JOIN `grado` ON matricula.idG= grado.idG WHERE matricula.matriculaID='$id'";

  $fpdf= new FPDF();
  $fpdf->AddPage('PORTRAIT','letter');
  
  class pdf extends FPDF
  {
    public function header()
    {
      $this->SetFont('Arial','B',10);
      $this->Cell(0,5,'',0,0,'C');
      $this->image('../../img/ok.png',10, 8, 30, 25,'png');
    }
    public function footer()
    {
      $this->SetFont('Arial','B',10);
      $this->SetY(-15);
      $this->Write(5,'Santa Cruz, Bolivia');
      $this->SetX(-40);
      $this->AliasNbPages('tpagina');
      $this->Write(5,$this->pageNo().'/tpagina');
    }
  }

  $fpdf= new pdf('P','mm','letter',true);
  $fpdf->AddPage('portrait','letter');
  $fpdf->SetMargins(20,35,20,20);
  $fpdf->SetFont('Arial','B',15);
  $fpdf->SetY(15);
  $fpdf->SetTextColor(16,87,97);
  $fpdf->Cell(0,5,'INFORME',0,0,'C');
  $fpdf->Ln();
  $fpdf->Cell(0,5,'PSICOPEDAGOGICO',0,0,'C');
  $fpdf->SetDrawColor(0,0,0);
  $fpdf->SetLineWidth(0.25);
  $fpdf->Ln();
  //$fpdf->Line(46,$fpdf->GetY() + 10, 158, $fpdf->GetY() +10);
  $fpdf->SetFont('Arial','', 12);
  $fpdf->Cell(0,5,'ENTREVISTA',0,0,'C');
  $fpdf->Ln();
  $fpdf->SetFont('Arial','B', 10);
  $fpdf->Cell(0,5,'AREA GABINETE PSICOPEDAGOGICO',0,0,'C');
  $fpdf->Ln();
  $fpdf->Cell(0,5,'PROCESO DE INSCRIPCION',0,0,'C'); 

  $fpdf->SetTextColor(0,0,0);
  $fpdf->Ln(20);
///---------------- termina------------------------