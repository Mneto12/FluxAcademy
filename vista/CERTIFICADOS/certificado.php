<?php
  define('FPDF_FONTPATH', 'font/');
  require ('fpdf/fpdf.php');

  $pdf=new FPDF('L','mm','A4');
  $pdf->AddPage();
  $pdf->Image('img/certificado4.png',0,0,297,210,'PNG');
  $pdf->SetFont('Arial','B',16);

    include("abrir_conexion.php");
    $idUsuario = $_POST['idUsuario'];
    $idCurso = $_POST['idCurso'];
    $resultados = mysqli_query($mysqli,'SELECT * FROM matricula, usuario, cursos WHERE
    matricula.idUsuario=usuario.idUsuario AND matricula.idCurso=cursos.idCurso AND usuario.idUsuario='.$idUsuario.' AND cursos.idCurso='.$idCurso);
    if($resultados!=NULL){
      while($consulta = mysqli_fetch_array($resultados))
      {
          // Nombre y Apellido
          $pdf->SetFont('helvetica','B',35);
          $pdf->SetXY(23,77);
          $pdf->Cell(250,20,ucfirst($consulta['nombre']) . " " . ucfirst($consulta['apellido']),0,0,'C',0);
          $pdf->SetXY(23,120);
          $pdf->Cell(250,30,ucfirst($consulta['nombre_curso']),0,0,'C',0);
          $pdf->SetFont('helvetica','',15);
          $pdf->SetXY(23,130);
          $pdf->Cell(250,30, 'Duracion: '.ucfirst($consulta['duracion']). ' Horas',0,0,'C',0);
    $pdf->Output();
      include("cerrar_conexion.php");
    
        
      }
    }
    if($resultados==NULL){
      echo "No existen registros";
    }
   
  
  
 
    
  ?>