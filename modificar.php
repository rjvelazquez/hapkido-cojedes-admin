<?php require_once("includes/connection.php"); 

?>
<?php  
session_start();
if(empty($_SESSION['username'])) { // Recuerda usar corchetes.
        header('Location: login.php');
    }

?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin HC</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.3.js"></script>
	<script src="js/tms_presets.js"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/Asap_400.font.js"></script>
    <script src="js/Coolvetica_400.font.js"></script>
	<script src="js/Kozuka_M_500.font.js"></script>
    <script src="js/cufon-replace.js"></script>
    <script src="js/FF-cash.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/general.css">
<style type="text/css">
<!--
. {
padding: 0px;
margin: 0px;
}

.Estilo18 {font-size: 12px; font-weight: bold; }
.Estilo23 {font-size: 20px}
-->
</style>

</head>
  <body onLoad="imprimir();">
  <?php
    include_once("header.php");
    ?>
<div class="main"> 
  <div class="bg-img"></div>
<!--==============================header=================================-->
   
    <section id="content">
<div id="php">
<?php
$registros = 1500; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
$inicio = ($pagina - 1) * $registros;
} 

 ?> 
 </div>
 
          
           
			
            <div class="block-3 box-shadow">
	<p>&nbsp;</p>
                     <?php
    include_once("marquee.php");
    ?>
					 

<div id="contenidoo" >

<span class="mensaje Estilo23">
<?php if (!empty($merror)) {echo "<p class=\"error\">" . $merror . "</p>";} ?></span>
<span class="subtitle Estilo23"><?php if (!empty($exito)) {echo "<p>" . $exito . "</p>";} ?></span>


<form action="form_mod.php" method="POST" id="formulario2">      
   <?php
//inicio borrado de registros
$nbrow = 0; //numero de registros
$cont = 0; //Para el checkbox


?>
<fieldset>
		<legend>Modificar Registros</legend>
<?php


//inicio consulta 
if( $_SESSION['club'] == 'Admin')
		{
			$resultados = mysql_query("select * from atletas ORDER BY Cedula DESC");
		}
	elseif( $_SESSION['club'] == 'Corea')
		{
			$resultados = mysql_query("SELECT * FROM atletas WHERE Club = 'Corea'");
		}
	elseif( $_SESSION['club'] == 'Cojedes')
		{
			$resultados = mysql_query("SELECT * FROM atletas WHERE Club = 'Cojedes'");
		}



//fin consulta 
?>

<center>
<table style="border:1px #FF0000; color:#000000; width:100%; text-align:center;">
<tr style="background:#FFD700;">
<?php
echo "<td><b></b></td><td><b>Club</b></td><td><b>Cedula</b></td><td><b>Nombres</b></td><td><b>Apellidos</b></td><td><b>Correo</b></td><td><b>E.</b></td><td><b>Gen.</b></td><td><b>F-N</b></td><td><b>Telf.</b></td><td><b>Direccion</b></td><td><b>T/CH</b></td><td><b>T/M</b></td><td><b>T/Z</b></td><td><b>Cinta</b></td><td><b>P.</b></td><td><b>Cat-E.</b></td><td><b>Rango</b></td><td><b>Cat-P.</b></td><td><b>Estado</b></td> \n"; 
?>
</tr>

<?php
while($row=mysql_fetch_array($resultados))
{
$nbrow++;
$cont++;
$club =$row["Club"];
$cedula =$row["Cedula"];
$nombres =$row["Nombres"];
$apellidos = $row["Apellidos"];
$correo =$row["correo"];
$edad =$row["Edad"];
$genero = $row["Genero"];
$fn = $row["F_N"];
$tel =$row["tel"];
$direccion =$row["direccion"];
$tc =$row["tc"];
$tm =$row["tm"];
$tz =$row["tz"];
$cinturon =$row["Cinturon"];
$peso =$row["Peso"];
$cate =$row["Categoria_Edad"];
$rango = $row["Rango"];
$catp =$row["Categoria_Peso"];
$estado = $row["Estado"];

print "<tr bgcolor='#FFFACD'> ";
print "<td><div align=\"center\"><font color=\"#000000\"><input type=\"radio\" name=\"Cedula\" value=\"".$cedula."\"></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$club</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$cedula</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$nombres</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$apellidos</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$correo</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$edad</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$genero</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$fn</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$tel</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$direccion</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$tc</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$tm</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$tz</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$cinturon</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$peso</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$cate</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$rango</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$catp</font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\">$estado</font></div></td>";
}
?>

</form>
<div align="center">


<form method="POST"  action="form_mod.php" name="nuevo_art" id="formularioborrar"    
>		<label><b>Cedula:</b>
		<input required="required" value="" name="Cedula" type="text" /><input style=" left:40px; margin-right:20px;" type="submit" name="enviar" id="enviar" value="Buscar" /> </label> <br />
		

	   </form></div>
</fieldset>



</table>


	  <input type="submit" name="modificar" value="Modificar"> <br /> 
</center>
</table><br /> 

	 
	 </div>
	<div class="clear">
     <p>&nbsp;</p> 
 </div>
<?php mysql_free_result($resultados); 
?>




<p>&nbsp;</p>
<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>   

<p>&nbsp;</p>
</div>
			
    </section> 
	
<!--==============================footer=================================-->
   <?php
    include_once("pie.php");
    ?> 
</div>  
<script>
	Cufon.now();
</script>  
</body>
</html>
