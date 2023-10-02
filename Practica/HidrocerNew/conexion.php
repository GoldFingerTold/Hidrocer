<?php
$connection = mysqli_connect('localhost', 'c2530827_consult', 'diDUru65gu');
if (!$connection){
    die("Fallo la conexion con la base de datos" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'c2530827_consult');
if (!$select_db){
    die("Database seleccionada ha fallado" . mysqli_error($connection));
}
?>