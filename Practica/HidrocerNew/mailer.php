<?php
$recaptcha = $_POST["g-recaptcha-response"];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LeVJYkUAAAAAEJ-3pDBzisuxDfkm6VjKcyfY1HH',
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
        echo 'Se envía el formulario';
    } else {
        echo 'No se envía el formulario';
    }

include('conexion.php');
if((isset($_POST['nombre']) && !empty($_POST['nombre']))
&& (isset($_POST['empresa']) && !empty($_POST['empresa']))
&& (isset($_POST['cargo']) && !empty($_POST['cargo']))
&& (isset($_POST['provincia']) && !empty($_POST['provincia']))
&& (isset($_POST['localidad']) && !empty($_POST['localidad']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['telefono']) && !empty($_POST['telefono']))
&& (isset($_POST['fecha']) && !empty($_POST['fecha']))
&& (isset($_POST['pax']) && !empty($_POST['pax']))
&& (isset($_POST['comentarios']) && !empty($_POST['comentarios']))){
 
 $nombre = $_POST['nombre'];
 $empresa = $_POST['empresa'];
 $cargo = $_POST['cargo'];
 $provincia = $_POST['provincia'];
 $localidad = $_POST['localidad'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];
 $fecha = $_POST['fecha'];
 $pax = $_POST['pax'];
 $comentarios = $_POST['comentarios'];
 $c_alta=date('Y-m-d');
 
 $to ="hugoceriani@gmail.com";
 $headers = "From : " . $email;
 if( mail($to, $phone, $message, $headers)){
 $query = "INSERT INTO `consulta` (nombre, empresa, cargo, provincia, localidad, email, telefono, comentarios, c_alta) VALUES ('$nombre', '$empresa', '$cargo', '$provincia', '$localidad', '$email', '$telefono', '$comentarios', '$c_alta')";
 $result = mysqli_query($connection, $query);
 header( "refresh:0;ok.html" );
 //echo "<center>E-Mail Enviado con exito, nos pondremos en contacto con usted pronto.</center>";
 }
}


// Create the email and send the message
$to = 'info@complejogoyena.com.ar,wye@wye-digital.com.ar'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto de:  $solicitante";
$email_body = "Mensaje de $solicitante.\n\n"."Detalle:\n\nAgasajado: $agasajado\n\nSolicitante: $solicitante\n\nLocalidad: $localidad\n\nTelefono: $telefono\n\nCelular: $celular\n\nEmail: $email\n\nTipo: $tipo\n\nFecha: $fecha\n\nPax: $pax\n\nComentarios:\n$comentarios";
$headers = "From: info@complejogoyena.com.ar\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
return true;	

?>