<?php
require_once '../db/db.php';
require_once('../pdf/fpdf.php');
include_once "../models/recetas_model.php";
include_once "../models/expediente_model.php";
include_once "../models/medicos_model.php";
include_once "../models/receptor_model.php";

$conexion = Conectar::conexion();

class PDF extends FPDF
{
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

//==========================================================================                Configuracion de tablas
function Row($data,$alinea)
{
    //Calculate the height of the row
    $nb=0;
    for($i=1;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=6*$nb;//alto de la fila
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    $fill = true;
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        if($i<=0)// verifico menor que 5 para alinear las columnas
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        else // verifico si es encabezado para alinearlo a la izquierda
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border

        $this->Rect($x,$y,$w,$h);
        $this->MultiCell($w,6,$data[$i],8,$a,'true'); //aqui modifique ante 5,1
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);

    }
    //Go to the next line
    $this->Ln($h);
}

//==========================================================================                Configuracion de tablas

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
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

//==========================================================================             Encabezados

function Header()
{

//$this->Image('../../statics/logo.jpg',7,4,40,25);
//$this->Image('img/logo' ,240,5,25,20);

$id = (isset($_GET['num'])) ? $_GET['num'] : '';

$tipo=new Recetas_model();
$tipo = $tipo->get_recetasid($id);

foreach($tipo as $coti){
    $fecha = $coti['Fecha'];
    $servicio = $coti['Servicio'];
    $expediente = $coti['Expediente'];
    $folio = $coti['Folio'];
}


$expe=new Expediente_model();
$expe = $expe->get_expedientenum($expediente);
foreach($expe as $diente){
$idmedico = $diente['idmedico'];
$idpaciente=$diente['idpaciente'];
$comunidad = $diente['Comunidad'];

}

$medico=new Medicos_model();
$medico = $medico->get_medicoid($idmedico);
foreach($medico as $diente){
$nombre = $diente['Nombre'];
$especialidad=$diente['Especialidad'];
$cedula=$diente['Cedula'];
}

$medico=new Receptor_model();
$medico = $medico->get_receptorid($idpaciente);
foreach($medico as $diente){
$nombre = $diente['Nombre'];
$curp=$diente['RFC'];
$direccion=$diente['Direccion'];
}


$this->SetFont('Arial','B',18);
$this->SetXY(10,16);
$this->Cell(10,6,utf8_decode("Centro de Salud"),0,1,'L');
$this->SetFont('Arial','',14);
$this->SetXY(10,21);
$this->Cell(0,6,utf8_decode("Cerro de las Campanas"),0,1,'L');
$this->SetXY(10,26);
$this->Cell(0,6,utf8_decode("01NBSS"),0,1,'L');
$this->SetXY(170,25);
$this->SetFont('Arial','B',18);
$this->Cell(0,6,utf8_decode("Receta"),0,1,'L');



$this->SetFont('Arial','B',12);
$this->SetXY(10,36);
$this->Cell(10,6,utf8_decode("Datos del Expediente"),0,1,'L');
$this->SetFont('Arial','',10);
$this->SetXY(10,40);
$this->Cell(0,6,"Fecha: ".utf8_decode($fecha),0,1,'L');
$this->SetXY(10,44);
$this->Cell(0,6,"Servicio: ".utf8_decode($servicio),0,1,'L');
$this->SetXY(10,48);
$this->Cell(0,6,"Expediente: ".utf8_decode($expediente),0,1,'L');
$this->SetXY(10,53);
$this->Cell(0,6,"Folio: ".utf8_decode($folio). "       Comunidad: ".utf8_decode($comunidad),0,1,'L');


$this->SetFont('Arial','B',12);
$this->SetXY(10,60);
$this->Cell(10,6,utf8_decode("Datos del Médico"),0,1,'L');
$this->SetFont('Arial','',10);
$this->SetXY(10,64);
$this->Cell(0,6,"Nombre: ".utf8_decode($nombre),0,1,'L');
$this->SetXY(10,68);
$this->Cell(0,6,"Especialidad: ".utf8_decode($especialidad),0,1,'L');
$this->SetXY(10,72);
$this->Cell(0,6,"Cedula Profesional: ".utf8_decode($cedula),0,1,'L');

$this->SetFont('Arial','B',12);
$this->SetXY(10,80);
$this->Cell(10,6,utf8_decode("Datos del Paciente"),0,1,'L');
$this->SetFont('Arial','',10);
$this->SetXY(10,84);
$this->Cell(0,6,"Nombre: ".utf8_decode($nombre),0,1,'L');
$this->SetXY(10,88);
$this->Cell(0,6,"CURP: ".utf8_decode($curp),0,1,'L');
$this->SetXY(10,92);
$this->Cell(0,6,"Domicilio: ".utf8_decode($direccion),0,1,'L');


}

//==========================================================================             Pie de la pagina

function Footer()
{

    $id = (isset($_GET['num'])) ? $_GET['num'] : '';

$tipo=new Recetas_model();
$tipo = $tipo->get_recetasid($id);

//foreach($tipo as $coti){

  //  $costo = $coti['costo'];
//}


  $this->SetY(-95);
  $this->SetFont('Arial','',9);
  $this->Cell(187,10,utf8_decode('Firma del Médico'),0,0,'C');
  $this->SetY(-80);
  $this->Cell(187,10,'___________________________',0,0,'C');
   $this->SetY(-15);
   $this->SetFont('Arial','I',8);
  $this->Cell(187,10,'Impreso:'.date("d/m/Y").', Hora:'.date("G:i:s"),0,0,'C');


}


//==========================================================================      Cuerpo del programas

}

    $pdf=new PDF('P','mm','Letter'); //P es verical y L horizontal
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetMargins(10,10,10);

    $id = (isset($_GET['num'])) ? $_GET['num'] : '';


    $alumn=$conexion->query("SELECT * from medica where idreceta = '$id'");


     $pdf->Ln(3);

     $pdf->SetWidths(array(100,100));
     $pdf->SetFont('Arial','B',9,'L');
     $pdf->SetFillColor(1,113,185);//color blanco rgb
     $pdf->SetTextColor(255);
     $pdf->SetLineWidth(.3);
    for($i=0;$i<1;$i++)
            {
                $pdf->Row(array(utf8_decode('Medicamentos'),'Indicaciones'),'L');
            }

    //***************-------------------------encabezados de las tablas
    $pdf->SetWidths(array(100,100));
    $pdf->SetFont('Arial','',10,'L');
   $pdf->SetFillColor(224,235,255);
    $pdf->SetFillColor(255,255,255);//color blanco rgb
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','',8);

        foreach( $alumn as $alumno ){
        $pdf->Row(array(utf8_decode($alumno['Medicamento']),$alumno['Indicaciones']),'L');
        }


$pdf->Output();
?>