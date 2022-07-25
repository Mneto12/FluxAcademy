<?php
  define('FPDF_FONTPATH', 'font/');
  require ('fpdf/fpdf.php');

  $pdf=new FPDF('L','mm','A4');
  $pdf->AddPage();
  $pdf->Image('img/certificado4.png',0,0,297,210,'PNG');
  $pdf->SetFont('Arial','B',16);

    include("abrir_conexion.php");
    $doc = $_POST['ced'];
    $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE cedula = $doc");
    if($resultados!=NULL){
      while($consulta = mysqli_fetch_array($resultados))
      {
          // Nombre y Apellido
          $pdf->SetFont('helvetica','B',35);
          $pdf->SetXY(23,77);
          $pdf->Cell(250,20,ucfirst($consulta['nombre']) . " " . ucfirst($consulta['apellido']),0,0,'C',0);
    $pdf->Output();
      include("cerrar_conexion.php");
    
        
      }
    }
    if($resultados==NULL){
      echo "No existen registros";
    }
   
  
  
 
    
  ?>