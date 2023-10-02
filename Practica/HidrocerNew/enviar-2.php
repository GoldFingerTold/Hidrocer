<?php
$recaptcha = $_POST["g-recaptcha-response"];
 
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '	6LcJ1lMfAAAAAAIrgsNREJJPBRy4i8csTP05kmWf',
		'response' => $recaptcha
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success = json_decode($verify);
	if ($captcha_success->success) {
//todo correcto


include('conexion.php');
if((isset($_POST['nombre']) && !empty($_POST['nombre']))
&& (isset($_POST['empresa']) && !empty($_POST['empresa']))
&& (isset($_POST['cargo']) && !empty($_POST['cargo']))
&& (isset($_POST['provincia']) && !empty($_POST['provincia']))
&& (isset($_POST['localidad']) && !empty($_POST['localidad']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['telefono']) && !empty($_POST['telefono']))
&& (isset($_POST['comentarios']) && !empty($_POST['comentarios']))){
 
 
 $nombre = $_POST['nombre'];
 $empresa = $_POST['empresa'];
 $cargo = $_POST['cargo'];
 $provincia = $_POST['provincia'];
 $localidad = $_POST['localidad'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];
 $comentarios = $_POST['comentarios'];
 $c_alta=date('Y-m-d');
 

 
 
 $to ="hugoceriani@gmail.com";
 $headers = "From : " . $email;
 if( mail($to, $phone, $message, $headers)){
 $query = "INSERT INTO `c2530827_consult` (nombre, empresa, cargo, provincia, localidad, email, telefono, comentarios,  c_alta) VALUES ('$nombre', '$empresa', '$cargo', '$provincia', '$localidad', $email', '$telefono', '$comentarios', '$c_alta')";
 $result = mysqli_query($connection, $query);
 header( "refresh:0;ok.html" );
 //echo "<center>E-Mail Enviado con exito, nos pondremos en contacto con usted pronto.</center>";
 }
}




// Create the email and send the message
$to = 'hugoceriani@gmail.com,wye@wye-digital.com.ar'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto de:  $nombre";
$email_body = "Mensaje de $nombre.\n\n"."Detalle:\n\nNombre: $nombre\n\nEmpresa: $empresa\n\n\n\nCargo: $cargo\n\nProvincia: $provincia\n\nLocalidad: $localidadEmail: $email\n\nTelefono: $telefono\n\nComentario: $comentario";
$headers = "From: hugoceriani@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
return true;	

}else{
//El código de validación de la imagen está mal escrito.

		echo '<script language="javascript">';
             echo 'alert("Por favor, complete el Captcha.")';
             echo '</script>';
             header("Refresh:1; url=form.html");
}

?>