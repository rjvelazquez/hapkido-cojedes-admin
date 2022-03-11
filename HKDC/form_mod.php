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
<div class="main">
  <div class="bg-img"></div>
<!--==============================header=================================-->
    <?php
    include_once("header.php");
    ?>
    <section id="content">

          
           
			
            <div class="block-3 box-shadow">
	<p>&nbsp;</p>
    <?php
    include_once("marquee.php");
    ?>
					 

<div id="contenidoo" >
<div id="php">

<?php

$cedula = $_POST['Cedula'];
  $query = "select * from atletas where Cedula = '$cedula'";     // Esta linea hace la consulta
    $result = mysql_query($query); 

    while ($registro = mysql_fetch_array($result)){ 
	$club = $registro['Club'];
 	$nombres = $registro['Nombres'];
	$apellidos = $registro['Apellidos'];
	$correo =$registro["correo"];
	$edad =$registro["Edad"];
	$fn = $registro["F_N"];
	$tel =$registro["tel"];
    $direccion =$registro["direccion"];
    $tc =$registro["tc"];
    $tm =$registro["tm"];
    $tz =$registro["tz"];
	$cinturon =$registro["Cinturon"];
	$genero = $registro["Genero"];
	$peso =$registro["Peso"];
	$cate =$registro["Categoria_Edad"];
	$rango = $registro["Rango"];
	$catp =$registro["Categoria_Peso"];
	$estado = $registro["Estado"];
	
	 
	}
	
	
	
	
	$mod = $_POST["mod"];
	if($mod=="yes"){
if(isset($_POST["enviar"])){

$club = $_POST['Club'];
$cedula = $_POST['Cedula'];
$nombres = $_POST['Nombres'];
$apellidos = $_POST['Apellidos'];
$correo = $_POST['correo'];
$edad = $_POST['Edad'];
$fn = $_POST['F_N'];
$tel = $_POST['tel'];
$direccion = $_POST['direccion'];
$tc = $_POST['tc'];
$tm = $_POST['tm'];
$tz = $_POST['tz'];
$cinturon = $_POST['Cinturon'];
$peso = $_POST['Peso'];
$genero = $_POST['Genero'];
$rango = $_POST['Rango'];
$cate = $_POST['Categoria_Edad'];
$catp = $_POST['Categoria_Peso'];
$estado = $_POST['Estado'];
	
 
$_GRABAR_SQL = "Update atletas set Club='$club', Nombres='$nombres', Apellidos='$apellidos', correo='$correo', Edad='$edad', F_N='$fn', tel='$tel', direccion='$direccion', tc='$tc', tm='$tm', tz='$tz', Cinturon='$cinturon', Peso='$peso', Genero='$genero', Rango='$rango', Categoria_Edad='$cate', Categoria_Peso='$catp', Estado='$estado' Where Cedula='$cedula'";
mysql_query($_GRABAR_SQL);

$exito= "Datos Modificados Exitosamente!";
}

else {
 $merror="Error!";
    }
}
	
?> </div>

<span class="mensaje Estilo23">
<?php if (!empty($merror)) {echo "<p class=\"error\">" . $merror . "</p>";} ?></span>
<span class="subtitle Estilo23"><?php if (!empty($exito)) {echo "<p>" . $exito . "</p>";} ?></span>
<form method="post" action="" name="nuevo_art" id="formulario"  onblur="if (Peso.value <40 && C_Edad.value=='Junior' && radio3.value=='M') { getElementById('C_Peso').value='-40 KG'; }   
 else  { getElementById('C_Peso').value='Verifique la Edad, el Peso y Seleccione un Genero'; }">
	<fieldset>
		<legend>Nuevo Registro</legend>

		<label><b>Club:</b>
		<select style="width: 210px; height:38px; padding: 7px; margin: 0px 0px 0px 0px;" name="Club" class="form-input2" required />
  <option selected="selected"><?php echo "$club"; ?></option>
  <option value="Cojedes">Cojedes</option>
  <option value="Cunaguaro">Cunaguaro</option>
  <option value="UDS">UDS</option>
  </select></label>
		<label><b>Cedula:</b>
		<input required="required" disabled="disabled" value="<?php echo "$cedula"; ?>" type="text" />  <input style="display:none" value="<?php echo "$cedula"; ?>" name="Cedula" type="text" />
		</label>
		<label><b>Nombres</b>
		<input required="required" value="<?php echo "$nombres"; ?>" name="Nombres" type="text" /></label>
		<label><b>Apellidos</b>
		<input required="required" value="<?php echo "$apellidos"; ?>" name="Apellidos" type="text" /></label>
		<label><b>Correo</b>
		<input value="<?php echo "$correo"; ?>" name="correo" type="email" /></label>
		<label><b>Edad</b>
		<input required="required" value="<?php echo "$edad"; ?>" name="Edad" type="number" onChange="if (this.value >=6 && this.value <9) { getElementById('C_Edad').value='Infantil I'; }
  else if (this.value >=9 && this.value <12) { getElementById('C_Edad').value='Infantil II'; }
 else if (this.value >=12 && this.value <15) { getElementById('C_Edad').value='Junior'; } 
 else if (this.value >=15 && this.value <18) { getElementById('C_Edad').value='Juvenil'; } 
  else if (this.value >=18 && this.value <31) { getElementById('C_Edad').value='Adulto'; }
   else if (this.value >=31 && this.value <36) { getElementById('C_Edad').value='Senior'; }
    else if (this.value >=36 && this.value <41) { getElementById('C_Edad').value='Master'; }
    else if (this.value >=41 && this.value <46) { getElementById('C_Edad').value='Master I'; }
    else if (this.value >=46) { getElementById('C_Edad').value='Master II'; }
    
     else if (this.value =='') { getElementById('C_Edad').value='Verifique la Edad'; }
 else  { getElementById('C_Edad').value='Verifique la Edad'; }
 getElementById('Peso').value='';" class="form-input"/></label>
		<label><b>Fecha de Nacimiento</b>
		<input value="<?php echo "$fn"; ?>" name="F_N" type="date" /></label>
		<label><b>Telefono</b>
		<input value="<?php echo "$tel"; ?>" name="tel" type="tel" /></label>
        <label><b>Direccion</b>
		<input value="<?php echo "$direccion"; ?>" name="direccion" type="text" /></label>
        <label><b>Talla de Chaqueta</b>
		<input value="<?php echo "$tc"; ?>" name="tc" type="text" /></label>
        <label><b>Talla de Mono</b>
		<input value="<?php echo "$tm"; ?>" name="tm" type="text" /></label>
        <label><b>Talla de Zapatos</b>
		<input value="<?php echo "$tz"; ?>" name="tz" type="text" /></label>
		<label><b>Cinturon:</b>
		<select style="width: 210px; height:38px; padding: 7px; margin: 0px 0px 0px 0px;" name="Cinturon"onChange="if (this.value=='Amarillo'||this.value=='Naranja'||this.value=='Blanco') { getElementById('Rango').value='Principiante'; } 
  else if (this.value=='Verde'||this.value=='Azul'||this.value=='Violeta') { getElementById('Rango').value='Intermedio'; }
  else if (this.value=='Rojo'||this.value=='Marron'||this.value=='Negro') { getElementById('Rango').value='Avanzado'; }
  else  { getElementById('Rango').value='Seleccione un Cinturon'; } " class="form-input2" required />
  <option selected="selected"><?php echo "$cinturon"; ?></option>
  <option value="Blanco">Blanco</option>
  <option value="Amarillo">Amarillo</option>
  <option value="Naranja">Naranja</option>
  <option value="Verde">Verde</option>
  <option value="Azul">Azul</option>
  <option value="Violeta">Violeta</option>
  <option value="Rojo">Rojo</option>
  <option value="Marron">Marron</option>
  <option value="Negro">Negro</option>
  </select></label>

		<div style="display:block; position: relative;">
		<label style="font-size:15px; display:block; padding:3px; margin:9px; margin-left:20px; margin-right:27px;"> <b>Genero: </b> <br /> 
		<?php 
			if($genero=="F"){
			include_once("g_fem.php");
			}
			else
			{
			include_once("g_mas.php");
			}
		?>		
		</label>	
	  </div>		
	  
	  
		<label><b>Peso:</b>
		 <input type="number" name="Peso" id="Peso" value="<?php echo "$peso"; ?>" onBlur="
  //Junior
 if (Peso.value =='') { getElementById('C_Peso').value='Verifique'; }
  
  else if (radio3.value=='M' && C_Edad.value=='Junior' && Peso.value <40) { getElementById('C_Peso').value='-40 KG'; }   
  else if (radio3.value=='M' && C_Edad.value=='Junior' && Peso.value <45) { getElementById('C_Peso').value='-45 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Junior' && Peso.value <50) { getElementById('C_Peso').value='-50 KG'; }   
   else if (radio3.value=='M' && C_Edad.value=='Junior' && Peso.value <55) { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Junior' && Peso.value <60) { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Junior' && Peso.value >=60) { getElementById('C_Peso').value='+60 KG'; }
   
   else if (Peso.value <38 && C_Edad.value=='Junior' && radio3.value=='F') { getElementById('C_Peso').value='-38 KG'; }   
  else if (Peso.value <43 && C_Edad.value=='Junior' && radio3.value=='F') { getElementById('C_Peso').value='-43 KG'; }
   else if (Peso.value <48 && C_Edad.value=='Junior' && radio3.value=='F') { getElementById('C_Peso').value='-48 KG'; }   
   else if (Peso.value <53 && C_Edad.value=='Junior' && radio3.value=='F') { getElementById('C_Peso').value='-53 KG'; }
   else if (Peso.value <58 && C_Edad.value=='Junior' && radio3.value=='F') { getElementById('C_Peso').value='-58 KG'; }
   else if (radio3.value=='F' && C_Edad.value=='Junior' && Peso.value >=58) { getElementById('C_Peso').value='+58 KG'; }
   
   //Juvenil
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <45) { getElementById('C_Peso').value='-45 KG'; }   
  else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <50) { getElementById('C_Peso').value='-50 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <55) { getElementById('C_Peso').value='-55 KG'; }   
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <60) { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <65) { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <70) { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value <75) { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='M' && C_Edad.value=='Juvenil' && Peso.value >=75) { getElementById('C_Peso').value='+70 KG'; }
   
   else if (Peso.value <43 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-43 KG'; }
   else if (Peso.value <48 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-48 KG'; }   
   else if (Peso.value <53 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-53 KG'; }
   else if (Peso.value <58 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-58 KG'; }
   else if (Peso.value <63 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-63 KG'; }
   else if (Peso.value <68 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-68 KG'; }   
   else if (Peso.value <73 && C_Edad.value=='Juvenil' && radio3.value=='F') { getElementById('C_Peso').value='-73 KG'; }
   else if (radio3.value=='F' && C_Edad.value=='Juvenil' && Peso.value >=73) { getElementById('C_Peso').value='+73 KG'; }
   
   //Adulto
   else if (radio3.value=='M' && Peso.value <55 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='M' && Peso.value <60 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && Peso.value <65 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='M' && Peso.value <70 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='M' && Peso.value <75 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='M' && Peso.value <80 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='M' && Peso.value <85 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-85 KG'; }
   else if (radio3.value=='M' && Peso.value >=85 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='+85 KG'; }
   
   else if (radio3.value=='F' && Peso.value <50 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-50 KG'; }
   else if (radio3.value=='F' && Peso.value <55 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='F' && Peso.value <60 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='F' && Peso.value <65 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='F' && Peso.value <70 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='F' && Peso.value <75 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='F' && Peso.value <80 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='F' && Peso.value >=80 && C_Edad.value=='Adulto') { getElementById('C_Peso').value='+80 KG'; }
   
    //Senior
   else if (radio3.value=='M' && Peso.value <55 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='M' && Peso.value <60 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && Peso.value <65 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='M' && Peso.value <70 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='M' && Peso.value <75 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='M' && Peso.value <80 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='M' && Peso.value <85 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-85 KG'; }
   else if (radio3.value=='M' && Peso.value >=85 && C_Edad.value=='Senior') { getElementById('C_Peso').value='+85 KG'; }
   
   else if (radio3.value=='F' && Peso.value <50 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-50 KG'; }
   else if (radio3.value=='F' && Peso.value <55 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='F' && Peso.value <60 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='F' && Peso.value <65 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='F' && Peso.value <70 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='F' && Peso.value <75 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='F' && Peso.value <80 && C_Edad.value=='Senior') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='F' && Peso.value >=80 && C_Edad.value=='Senior') { getElementById('C_Peso').value='+80 KG'; }
   
   
       //Master
   else if (radio3.value=='M' && Peso.value <55 && C_Edad.value=='Master') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='M' && Peso.value <60 && C_Edad.value=='Master') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && Peso.value <65 && C_Edad.value=='Master') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='M' && Peso.value <70 && C_Edad.value=='Master') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='M' && Peso.value <75 && C_Edad.value=='Master') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='M' && Peso.value <80 && C_Edad.value=='Master') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='M' && Peso.value <85 && C_Edad.value=='Master') { getElementById('C_Peso').value='-85 KG'; }
   else if (radio3.value=='M' && Peso.value >=85 && C_Edad.value=='Master') { getElementById('C_Peso').value='+85 KG'; }
   
   else if (radio3.value=='F' && Peso.value <50 && C_Edad.value=='Master') { getElementById('C_Peso').value='-50 KG'; }
   else if (radio3.value=='F' && Peso.value <55 && C_Edad.value=='Master') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='F' && Peso.value <60 && C_Edad.value=='Master') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='F' && Peso.value <65 && C_Edad.value=='Master') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='F' && Peso.value <70 && C_Edad.value=='Master') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='F' && Peso.value <75 && C_Edad.value=='Master') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='F' && Peso.value <80 && C_Edad.value=='Master') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='F' && Peso.value >=80 && C_Edad.value=='Master') { getElementById('C_Peso').value='+80 KG'; }
   
   
        //MasterI
   else if (radio3.value=='M' && Peso.value <55 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='M' && Peso.value <60 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && Peso.value <65 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='M' && Peso.value <70 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='M' && Peso.value <75 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='M' && Peso.value <80 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='M' && Peso.value <85 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-85 KG'; }
   else if (radio3.value=='M' && Peso.value >=85 && C_Edad.value=='Master I') { getElementById('C_Peso').value='+85 KG'; }
   
   else if (radio3.value=='F' && Peso.value <50 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-50 KG'; }
   else if (radio3.value=='F' && Peso.value <55 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='F' && Peso.value <60 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='F' && Peso.value <65 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='F' && Peso.value <70 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='F' && Peso.value <75 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='F' && Peso.value <80 && C_Edad.value=='Master I') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='F' && Peso.value >=80 && C_Edad.value=='Master I') { getElementById('C_Peso').value='+80 KG'; }
   
   
   //MasterII
   else if (radio3.value=='M' && Peso.value <55 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='M' && Peso.value <60 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='M' && Peso.value <65 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='M' && Peso.value <70 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='M' && Peso.value <75 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='M' && Peso.value <80 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='M' && Peso.value <85 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-85 KG'; }
   else if (radio3.value=='M' && Peso.value >=85 && C_Edad.value=='Master II') { getElementById('C_Peso').value='+85 KG'; }
   
   else if (radio3.value=='F' && Peso.value <50 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-50 KG'; }
   else if (radio3.value=='F' && Peso.value <55 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-55 KG'; }
   else if (radio3.value=='F' && Peso.value <60 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-60 KG'; }
   else if (radio3.value=='F' && Peso.value <65 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-65 KG'; }
   else if (radio3.value=='F' && Peso.value <70 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-70 KG'; }
   else if (radio3.value=='F' && Peso.value <75 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-75 KG'; }
   else if (radio3.value=='F' && Peso.value <80 && C_Edad.value=='Master II') { getElementById('C_Peso').value='-80 KG'; }
   else if (radio3.value=='F' && Peso.value >=80 && C_Edad.value=='Master II') { getElementById('C_Peso').value='+80 KG'; }
   
      
   
 else  { getElementById('C_Peso').value='Verifique la Edad, el Peso y Seleccione un Genero'; }"  class="form-input"/>
		
		</label>
		
		 
		<label><b>Categoria Edad:</b>
		<input name="Categoria_Edad" type="text" required class="form-input" value="<?php echo "$cate"; ?>" id="C_Edad" readonly/></label>
			<label><b>Rango:</b>
		<input name="Rango" type="text" required class="form-input" value="<?php echo "$rango"; ?>" id="Rango" readonly/></label>
			<label><b>Categoria Peso:</b>
		<input name="Categoria_Peso" type="text" required class="form-input" value="<?php echo "$catp"; ?>" id="C_Peso" readonly/></label>
		<label><b>Estado:</b>
		<select style="width: 210px; height:38px; padding: 7px; margin: 0px 0px 0px 0px;" name="Estado" class="form-input2" required />
  <option selected="selected"><?php echo "$estado"; ?></option>
  <option value="Iniciacion">Iniciacion</option>
  <option value="Desarrollo">Desarrollo</option>
  <option value="Preseleccion">Preseleccion</option>
  </select></label> <br /> 
					<label for="enviar">
			<input style="display:none" value="yes" name="mod" type="text" />
			<input  type="submit" class="uno" name="enviar" id="enviar" value="Guardar" /></label>
	  </div>
	  </fieldset>
   </form>  


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

