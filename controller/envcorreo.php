<?php
if($_REQUEST['acc']=='o'){
    

//Importamos las variables del formulario de contacto
@$nombre = addslashes($_POST['txtnomb']); 
@$email = addslashes($_POST['txtemail']);
@$motivo = addslashes($_POST['txtmotiv']);
@$mensaje = addslashes($_POST['mensaje']);
 


//Preparamos el mensaje de contacto
$cabeceras = "From: $email\n" //La persona que envia el correo
 . "Reply-To: $email\n";
$asunto = "Mensaje desde la pagina Web"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "lauracastillo@floreriadelbosque.com"; //cambiar por tu email
$contenido = "$nombre ha enviado un mensaje de contacto\n"
. "\n"
. "Nombre: $nombre\n"
. "Email: $email\n"
. "Motivo: $motivo\n"
. "Mensaje: $mensaje\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {

    header("Location: ../view/contacto.php");
}}else{
     header("Location: ../view/contacto.php");
}
?>