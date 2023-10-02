<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["empresa"]) || !isset($_POST["cargo"]) || !isset($_POST["provincia"]) || !isset($_POST["localidad"]) || !isset($_POST["email"]) || !isset($_POST["telefono"]) || !isset($_POST["asunto"])  ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"];
$empresa = $_POST["empresa"];
$cargo = $_POST["cargo"];
$provincia = $_POST["provincia"];
$localidad = $_POST["localidad"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$asunto = $_POST["asunto"];


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2530827.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@c2530827.ferozo.com";  // Mi cuenta de correo
$smtpClave = "H5N*Pje6vF";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto 
$emailDestino ="hidrocer.web@gmail.com";


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Hidrocer S.A. - Formulario desde la web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Formulario de ejemplo.<br />"; // Texto del email en formato HTML
$mail->Body = "Nombre: {$nombre} <br />Empresa: {$empresa} <br />Cargo: {$cargo} <br />Provincia: {$provincia} <br />Localidad: {$localidad} <br />Email: {$email} <br />Telefono: {$telefono} <br />Asunto: {$asunto} <br /><br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo."; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "<script language='JavaScript'>
window.top.location = \"http://www.hidrocer.com.ar/consulta-ok.html\"
</script>
";
} else {
    echo "Ocurrió un error inesperado.";
}