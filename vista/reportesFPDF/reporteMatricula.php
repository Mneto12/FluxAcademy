<?php

require 'fpdf/fpdf.php';
require 'conexion/Conexion.php'; 
class PDF extends FPDF {

// Cabecera de página

function Header() {
	$this->SetFont('Times', 'B', 20);
	$this->Image('img/waves2.png', 0, 0, 210); //imagen(archivo, png/jpg || x,y,tamaño)
	$this->setXY(65, 30);
	$this->Cell(120, 8, utf8_decode('Listado de Matriculación'), 0, 1, 'C', 0);
	$this->Image('img/icon.png', 10, 10, 35); //imagen(archivo, png/jpg || x,y,tamaño)
	$this->Ln(40);
}

// Pie de página

function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Flux Academy © Todos los derechos reservados."),0,0,"C");
        
}

// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data, $setX)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));

    $h=8*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h,$setX);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h, 'DF');
        //Print the text
        $this->MultiCell($w,8,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h,$setX)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger){
		$this->AddPage($this->CurOrientation);
		$this->SetX($setX);

		//volvemos a definir el  encabezado cuando se crea una nueva pagina
		
	$this->SetFont('Helvetica', 'B', 13);
    $this->SetX(7);
        $this->SetFont('Helvetica', 'B', 13);
            $this->Cell(25, 8, 'ID', 1, 0, 'C', 0);
            $this->Cell(45, 8, utf8_decode('Nombre del Curso'), 1, 0, 'C', 0);
            $this->Cell(30, 8, utf8_decode('Nombre'), 1, 0, 'C', 0);
            $this->Cell(22, 8, utf8_decode('Apellido'), 1, 0, 'C', 0);
            $this->Cell(25, 8,utf8_decode('Cédula'), 1, 0, 'C', 0);
            $this->Cell(48, 8, utf8_decode(' Fecha de Inscripción'), 1, 1, 'C', 0);
	$this->SetFont('Arial', '', 12);
	}

	if ($setX == 100) {
		$this->SetX(100);
	} else {
		$this->SetX($setX);
	}
       
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
	}
// -----------------------------------TERMINA---------------------------------
}

//------------------OBTENER LOS DATOS DE LA BASE DE DATOS-------------------------
$data = new Conexion();
$conexion = $data->conect();
$strquery = "SELECT * FROM matricula as m 
INNER JOIN usuario as u 
    ON m.idUsuario = u.idUsuario 
INNER JOIN cursos as c
    ON m.idCurso = c.idCurso
    ORDER BY m.idInscripcion";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade la apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
$pdf->SetX(7);
$pdf->SetFont('Helvetica', 'B', 13);
    $pdf->Cell(25, 8, 'ID', 1, 0, 'C', 0);
    $pdf->Cell(45, 8, utf8_decode('Nombre del Curso'), 1, 0, 'C', 0);
    $pdf->Cell(30, 8, utf8_decode('Nombre'), 1, 0, 'C', 0);
    $pdf->Cell(22, 8, utf8_decode('Apellido'), 1, 0, 'C', 0);
    $pdf->Cell(25, 8,utf8_decode('Cédula'), 1, 0, 'C', 0);
    $pdf->Cell(48, 8, utf8_decode(' Fecha de Inscripción'), 1, 1, 'C', 0);
   
// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 12);

//El ancho de las celdas
$pdf->SetWidths(array(25,45,30,22,25,48)); //???
//Alineacion de cada Columna
$pdf->SetAligns(array('C','C','C','C','C','C'));

for ($i = 0; $i < count($data); $i++) {
   
    $pdf->Row(array($data[$i]['idInscripcion'],utf8_decode($data[$i]['nombre_curso']),utf8_decode($data[$i]['nombre']),utf8_decode($data[$i]['apellido']),$data[$i]['cedula'],$data[$i]['creado']),7);
	
}

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
?>