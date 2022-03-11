<?php	
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
	
	
	
	
?>	