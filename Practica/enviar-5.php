<?php
$recaptcha = $_POST["g-recaptcha-response"];
 
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '	6LcnWogUAAAAAKYPSCz7Op7Il7W6EyOQMF8pIz1z',
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
if((isset($_POST['agasajado']) && !empty($_POST['agasajado']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['telefono']) && !empty($_POST['telefono']))
&& (isset($_POST['tipo']) && !empty($_POST['tipo']))
&& (isset($_POST['fecha']) && !empty($_POST['fecha']))
&& (isset($_POST['pax']) && !empty($_POST['pax']))){
 
 
 $agasajado = $_POST['agasajado'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];
 $tipo = $_POST['tipo'];
 $fecha = $_POST['fecha'];
 $pax = $_POST['pax'];
 $c_alta=date('Y-m-d');
 

 
 
 $to ="hugoceriani@gmail.com";
 $headers = "From : " . $email;
 if( mail($to, $phone, $message, $headers)){
 $query = "INSERT INTO `consulta` (agasajado, email, telefono, tipo, fecha, pax,  c_alta) VALUES ('$agasajado', '$email', '$telefono', '$tipo', '$fecha', '$pax', '$c_alta')";
 $result = mysqli_query($connection, $query);
 header( "refresh:0;ok.html" );
 //echo "<center>E-Mail Enviado con exito, nos pondremos en contacto con usted pronto.</center>";
 }
}




// Create the email and send the message
$to = 'hugoceriani@gmail.com,wye@wye-digital.com.ar'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto de:  $agasajado";
$email_body = "Mensaje de $agasajado.\n\n"."Detalle:\n\nAgasajado: $agasajado\n\nEmail: $email\n\nTelefono: $telefono\n\nTipo: $tipo\n\nFecha: $fecha\n\nPax: $pax";
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