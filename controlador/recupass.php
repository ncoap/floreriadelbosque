<?php
if(isset($_REQUEST['accion'])){
        $accion=$_REQUEST['accion'];
    }else{
        header('Location: ../vista/index.php');
    }
    session_start();
    include '../util/util.php';
  

   $cnx=new util();
             $cn=$cnx->getConexion();
             switch ($accion) {
    	case 'recupass':
            @$mail = addslashes($_POST['txtmail']); 
            $res=$cn->prepare("call buscarmail(:mail);");			
			$res->bindParam(':mail', $mail);
			$res->execute();
			foreach ($res as $row) {
				$m=$row[0];
				$GLOBALS['m'];
                                $n=$row[2];
                                 $p=$row[1];
                                 $GLOBALS['n'];
                                 $GLOBALS['p'];
			}
                        
                        
			if($m==$mail){
                            $cabeceras = "From: lauracastillo@floreriadelbosque.com\n" //La persona que envia el correo
                            . "Reply-To: $mail\n";
                            $asunto = "Recuperacion de Contraseña - Floreria del Bosque"; //asunto aparecera en la bandeja del servidor de correo
                            $email_to = $mail; //cambiar por tu email
                            $contenido = "$n Usted solicito su contraseña:\n"
                            . "\n"
                            . "Email: $mail\n"
                            . "Contraseña: $p\n"
                            . "\n";
                            //Enviamos el mensaje y comprobamos el resultado
                            if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {
                                header("Location: ../vista/login.php");
                            }
                        $_SESSION['msg']='Revise su Correo Electrónico';
		 	header('Location: ../vista/login.php');
			}elseif($m==null){
                            $_SESSION['msg']='No hay ninguna cuenta registrada con este Email';
		 	header('Location: ../vista/login.php');
                        }
                break;
            
                }
?>
