<?php
require_once '../db/db.php';
require_once('../pdf/fpdf.php');

include_once "../models/medicos_model.php";
include_once "../models/receptor_model.php";
include_once "../models/comunidad_model.php";


$medico=new Medicos_model();
$medico = $medico->get_medico();

$paciente=new Receptor_model();
$paciente = $paciente->get_receptor();

$comunidad=new Comunidad_model();
$comunidad = $comunidad->get_comunidad();




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

    $this->Image('../statics/Logo_Salud.jpg',0,4,70,30);
    $this->Image('../statics/saludchiapas.jpg',150,6,60,20);

$this->SetXY(10,30);

$this->SetFont('Arial','B',12);
$this->Cell(10,6,utf8_decode("EXPEDIENTES"),0,1,'L');
$this->SetFont('Arial','',10);


}

//==========================================================================             Pie de la pagina

function Footer()
{

    $id = (isset($_GET['num'])) ? $_GET['num'] : '';


   $this->SetY(-15);
   $this->SetFont('Arial','I',8);
  $this->Cell(187,10,'Impreso:'.date("d/m/Y").', Hora:'.date("h:i:s"),0,0,'C');


}


//==========================================================================      Cuerpo del programas

}

    $pdf=new PDF('P','mm','Letter'); //P es verical y L horizontal
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetMargins(10,10,10);

    $id = (isset($_GET['num'])) ? $_GET['num'] : '';

    


   if(empty($_GET['num'])){

    $alumn=$conexion->query("SELECT e.id as id,e.idmedico as mid,p.id as pid, m.Nombre as Medico,p.Nombre as Paciente, e.Expediente,e.Fecha,Comunidad 
    FROM expediente as e
    inner join medicos as m on m.id = e.idmedico
    inner join receptor as p on p.id = e.idpaciente 
    order by e.id");
   }
   else
   {
    $alumn=$conexion->query("SELECT e.id as id,e.idmedico as mid,p.id as pid, m.Nombre as Medico,p.Nombre as Paciente, e.Expediente,e.Fecha,Comunidad 
    FROM expediente as e
    inner join medicos as m on m.id = e.idmedico
    inner join receptor as p on p.id = e.idpaciente where CONCAT_WS('',Comunidad,p.Nombre,e.Expediente) like '%$id%'
    order by e.id");

   }




//    $alumn=$conexion->query("SELECT * from medica where idreceta = '$id'");

     $pdf->Ln(3);

     $pdf->SetWidths(array(50,50,20,30,50));
     $pdf->SetFont('Arial','B',9,'L');
     $pdf->SetFillColor(1,113,185);//color blanco rgb
     $pdf->SetTextColor(255);
     $pdf->SetLineWidth(.3);
    for($i=0;$i<1;$i++)
            {
                $pdf->Row(array(utf8_decode('Medico'),utf8_decode('Paciente'),'Expediente','Fecha',utf8_decode('Comunidad')),'L');
            }

    //***************-------------------------encabezados de las tablas
    $pdf->SetWidths(array(50,50,20,30,50));
    $pdf->SetFont('Arial','',10,'L');
   $pdf->SetFillColor(224,235,255);
    $pdf->SetFillColor(255,255,255);//color blanco rgb
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','',8);

        foreach( $alumn as $alumno ){
        $pdf->Row(array(utf8_decode($alumno['Medico']),utf8_decode($alumno['Paciente']),$alumno['Expediente'],$alumno['Fecha'],utf8_decode($alumno['Comunidad']) ) ,'L');
        }


$pdf->Output();
?>