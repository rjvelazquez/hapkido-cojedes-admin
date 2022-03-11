<?php  
session_start();
if(!empty($_SESSION['username'])) { // Recuerda usar corchetes.
        header('Location: home.php');
    }
?>

<?php require_once("includes/connection.php"); ?>
<?php
date_default_timezone_set('America/La_Paz');
$operacion='inicio de sesion';
$fecha=date("Y/m/d");
$hora=date("H:i:s");



if(isset($_SESSION["username"])){
// echo "Session is set"; // for testing purposes
header("Location: home.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

  	
	$query1 = ("SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");

    $query = mysqli_query($con,$query1) or die (mysqli_error($con));

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
	$dbusername=$row['username'];
    $dbpassword=$row['password'];
    $dbclub=$row['club'];
	$nombre=$row['nombre'];
	$apellido=$row['apellido'];
	$correo=$row['correo'];
	$edad=$row['edad'];
	$fn=$row['fn'];
	$direccion=$row['direccion'];
	$telefono=$row['telefono'];
	
    
    }

    if($username == $dbusername && $password == $dbpassword)

    {

session_start();
    $_SESSION['username']=$username;
    $_SESSION['club']=$dbclub;
    $_SESSION['name']=$nombre;
	
	$_GRABAR_SQL = "INSERT INTO logs (username,fecha,hora,operacion) VALUES ('$dbusername', '$fecha', '$hora', '$operacion')";
mysqli_query($con, $_GRABAR_SQL);
	

	
// Libreria PHPMailer
require 'PHPMailer/PHPMailerAutoload.php';
 
// Creamos una nueva instancia
$mail = new PHPMailer();
 
// Activamos el servicio SMTP
$mail->isSMTP();
// Activamos / Desactivamos el "debug" de SMTP 
// 0 = Apagado 
// 1 = Mensaje de Cliente 
// 2 = Mensaje de Cliente y Servidor 
$mail->SMTPDebug = 2; 
 
// Log del debug SMTP en formato HTML 
$mail->Debugoutput = 'html'; 
 
// Servidor SMTP (para este ejemplo utilizamos gmail) 
$mail->Host = 'smtp.gmail.com'; 
 
// Puerto SMTP 
$mail->Port = 587; 
 
// Tipo de encriptacion SSL ya no se utiliza se recomienda TSL 
$mail->SMTPSecure = 'tls'; 
 
// Si necesitamos autentificarnos 
$mail->SMTPAuth = true; 
 
// Usuario del correo desde el cual queremos enviar, para Gmail recordar usar el usuario completo (usuario@gmail.com) 
$mail->Username = "victor16aguilar17@gmail.com"; 
 
// Contrase?a 
$mail->Password = "aguilar17victor16"; 
 
// Conectamos a la base de datos 
$db = new mysqli('localhost', 'anime365', '1234', 'my_anime365'); 
 
if ($db->connect_errno > 0) { 
    die('Imposible conectar [' . $db->connect_error . ']'); 
} 
 
// Creamos la sentencias SQL 
 
// Iniciamos el "bucle" para enviar multiples correos. 
 

 
 
    $mail->setFrom('victor16aguilar17@gmail.com', 'HKDA'); 
    $mail->addAddress('hapkido.uds@gmail.com','UDS'); 
 
    //La linea de asunto 
    $mail->Subject = 'Notificacion HKDA'; 
 
    // La mejor forma de enviar un correo, es creando un HTML e insertandolo de la siguiente forma, PHPMailer permite insertar, imagenes, css, etc. (No se recomienda el uso de Javascript) 

 	$mail->IsHTML(false);
	$mail->Body = "El siguiente usuario acaba de iniciar sesion:\n\nUsuario: $dbusername \nNombre: $nombre\nApellido: $apellido\nCorreo: $correo\nEdad: $edad\nFecha de Nacimiento: $fn\nDireccion: $direccion\nTelefono: $telefono";
 
    // Enviamos el Mensaje 
    $mail->send(); 
 
    // Borramos el destinatario, de esta forma nuestros clientes no ven los correos de las otras personas y parece que fuera un ?nico correo para ellos. 
    $mail->ClearAddresses(); 
	
	
	
	













    /* Redirect browser */
    header("Location: home.php");
    }
    } else {

 $message =  "Contraseña invalida!";
    }

} else 
{
    $message = "Todos los campos son requeridos!";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin HC</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
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
    <script>
		$(window).load(function(){
			$('.slider')._TMS({
			prevBu:'.prev',
			nextBu:'.next',
			pauseOnHover:true,
			pagNums:false,
			duration:800,
			easing:'easeOutQuad',
			preset:'Fade',
			slideshow:7000,
			pagination:'.pagination',
			waitBannerAnimation:false,
			banners:'fade'
			})
		}) 	
    </script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
	<style>
	.group {
border: 1px solid #999999;
margin: 0 auto;
padding: 20px;
width: 400px;
}
.contact-form {
width: 400px;
text-align: left;
}
.form-input {
display: block;
width: 380px;
height: 15px;
padding: 5px 10px;
margin-bottom: 15px;
font: 14px ’Helvetica Neue’, Helvetica, Arial, sans-serif;
color: #FFFFFF;
background-color: #777;
border: 1px solid #999;
box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 1px 0 rgba(255, 255, 255, 0.1);
-moz-transition: all 0.4s ease-in-out;
-webkit-transition: all 0.4s ease-in-out;
-o-transition: all 0.4s ease-in-out;
-ms-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
behavior: url(PIE.htc);
}

textarea.form-input {
width: 380px;
height: 200px;
overflow: auto;
}
.form-input:focus {
border: 1px solid #7fbbf9;
-moz-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #7fbbf9;
-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #7fbbf9;
box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #7fbbf9;
}
.form-input:-moz-ui-invalid {
border: 1px solid #e00;
-moz-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #e00;
-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #e00;
box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #e00;
}
.form-input.invalid {
border: 1px solid #e00;
-moz-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #e00;
-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #e00;
box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 0 1px #e00;
}
.form-btn {
padding: 0 15px;
height: 30px;
font: bold 12px ’Helvetica Neue’, Helvetica, Arial, sans-serif;
text-align: center;
color: #fff;
text-shadow: 0 1px 0 rgba(0, 0, 0, 0.7);
cursor: pointer;
border: 1px solid #0d3d6a;
outline: none;
position: relative;
background-color: #1d83e2;
background-image: -webkit-gradient(linear, left top, left bottom, from(#1d83e2), to(#0d3d6a)); /* Saf4+, Chrome */
background-image: -webkit-linear-gradient(top, #1d83e2, #0d3d6a); /* Chrome 10+, Saf5.1+, iOS 5+ */
background-image: -moz-linear-gradient(top, #1d83e2, #0d3d6a); /* FF3.6 */
background-image: -ms-linear-gradient(top, #1d83e2, #0d3d6a); /* IE10 */
background-image: -o-linear-gradient(top, #1d83e2, #0d3d6a); /* Opera 11.10+ */
background-image: linear-gradient(top, #1d83e2, #0d3d6a);
-pie-background: linear-gradient(top, #1d83e2, #0d3d6a); /* IE6-IE9 */
-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), 0 1px 2px rgba(0, 0, 0, 0.7);
-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), 0 1px 2px rgba(0, 0, 0, 0.7);
box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), 0 1px 2px rgba(0, 0, 0, 0.7);
-moz-background-clip: padding;
 -webkit-background-clip: padding-box;
 background-clip: padding-box;
 behavior: url(PIE.htc);
 }
 .form-btn:active {
 border: 1px solid #1d83e2;
 background-color: #0d3d6a;
 background-image: -webkit-gradient(linear, left top, left bottom, from(#0d3d6a), to(#1d83e2)); /* Saf4+, Chrome */
 background-image: -webkit-linear-gradient(top, #0d3d6a, #1d83e2); /* Chrome 10+, Saf5.1+, iOS 5+ */
 background-image: -moz-linear-gradient(top, #0d3d6a, #1d83e2); /* FF3.6 */
 background-image: -ms-linear-gradient(top, #0d3d6a, #1d83e2); /* IE10 */
 background-image: -o-linear-gradient(top, #0d3d6a, #1d83e2); /* Opera 11.10+ */
 background-image: linear-gradient(top, #0d3d6a, #1d83e2);
 -pie-background: linear-gradient(top, #0d3d6a, #1d83e2); /* IE6-IE9 */
 -moz-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.7), 0 1px 0 rgba(255, 255, 255, 0.1);
 -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.7), 0 1px 0 rgba(255, 255, 255, 0.1);

 box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.7), 0 1px 0 rgba(255, 255, 255, 0.1);
 behavior: url(PIE.htc);
 }
 label {
 margin-bottom: 5px;
 display: block;
 width: 300px;
 color: #555;
 font-size: 14px;
 font-weight: bold;
 }
 label span {
 font-size: 12px;
 color: #fff;
 font-weight: normal;
 }
 .contact-form.frame {
 background-color: #444444;
 border: 1px solid #CCCCCC;
 padding: 20px;
 } 
	</style>
</head>
<body>

<div class="main">
  <div class="bg-img"></div>
<!--==============================header=================================-->
<?php
require_once("headerl.php");
?>
<!--==============================content================================--> 
    <section id="content"><div class="ic"></div>
        <div class="container_12">
          
            <div class="grid_12 top-1">
            <div class="block-3 box-shadow">
              <marquee><h1 style="font-size:24px">Bienvenidos a HCA</h1></marquee>
              
			  <div class="group">




<form id="login" action="" method="post">
<label style="text-align:center; margin-left:50px;"><h2 style="text-decoration:blink;">Iniciar Sesion</h2>
</label>
<label for="user"></label>
<div align="center">
  <label for="user">Usuario</label>
  <input type="text" name="username" class="form-input" required/>
</div>
<label for="pass"></label>
<div align="center">
  <label for="pass">Contraseña</label>
  <input type="password" name="password" class="form-input" required/>
</div>
  <input class="form-btn" name="login" type="submit" value="Iniciar Sesion" />
</form>
<?php 
$fecha=date("Y/m/d");
$hora=date("H:i:s");
date_default_timezone_set('America/La_Paz');

if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";} ?>
			  
              </div>
          </div>
          <div class="clear"></div>
        </div>
 
<!--==============================footer=================================-->
<?php
    include_once("pie.php");?> 
</div>  
 
</body>
</html>
