<?php
include('conexion-2.php');
if((isset($_POST['name']) && !empty($_POST['name']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['phone']) && !empty($_POST['phone']))){
 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $message = $_POST['message'];
 
 $to = "hugoceriani@gmail.com";
 $headers = "From : " . $email;
 if( mail($to, $phone, $message, $headers)){
 $query = "INSERT INTO `contacto` (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
 $result = mysqli_query($connection, $query);
 echo "<center>E-Mail Enviado con exito, nos pondremos en contacto con usted pronto.</center>";
 }
}
?>