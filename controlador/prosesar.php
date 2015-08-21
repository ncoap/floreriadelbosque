<?php 
$carpeta="../img/";//definimos la carpeta donde guardaremos
opendir($carpeta);//abre la carpeta
$destino=$carpeta.$_FILES['foto']['name'];
copy($_FILES['foto']['tmp_name'],$destino);
$nombre=$_FILES['foto']['name'];
header("Location: ../controlador/controlador.php?op=1")
?>