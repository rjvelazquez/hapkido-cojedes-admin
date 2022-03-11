
<?php
require_once("includes/connection.php");
session_start();
if(empty($_SESSION['username'])) { // Recuerda usar corchetes.
        header('Location: login.php');
    }
date_default_timezone_set('America/La_Paz');
$operacion='listado general';
$fecha1=date("Y/m/d");
$hora1=date("H:i:s");
$dbusername=$_SESSION['username'];

$query =mysql_query("SELECT * FROM users");

$_GRABAR_SQL = "INSERT INTO logs (username,fecha,hora,operacion) VALUES ('$dbusername', '$fecha1', '$hora1', '$operacion')";
mysql_query($_GRABAR_SQL);

include('class.ezpdf.php');
$pdf=new Cezpdf('L','landscape');  
$pdf->selectFont('/fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1,1);

$conexion = mysql_connect("localhost", "anime365", "1234");
mysql_select_db("my_anime365", $conexion);
$queEmp = "SELECT * FROM atletas ORDER BY Edad ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('ID'=>$ixx));
}


$titles = array(
				'Club'=>'<b>CLUB</b>',	
				'Cedula'=>'<b>CEDULA</b>',
				'Nombres'=>'<b>NOMBRES</b>',
				'Apellidos'=>'<b>APELLIDOS</b>',
				'correo'=>'<b>CORREO</b>',
				'Edad'=>'<b>E.</b>',
				'F_N'=>'<b>F.N.</b>',
				'tel'=>'<b>TELF.</b>',
				'Cinturon'=>'<b>CINTA</b>',
				'Peso'=>'<b>P.</b>',
				'Genero'=>'<b>G.</b>',
					'Rango'=>'<b>RANGO</b>',
				'Categoria_Edad'=>'<b>CAT-E<b>',
				'Categoria_Peso'=>'<b>CAT-P</b>',
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>'810px'
			);

$txttit.= "Listado de Atetas Hapkido Cojedes";
$pdf->ezText($txttit, 14);
$pdf->ezText("Fecha: ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("\n", 10);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);


$pdf->ezStream();
?>
