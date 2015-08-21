<?php
		if(isset($_REQUEST['accion'])){
        $accion=$_REQUEST['accion'];
    }else{
        header('Location: ../view/index.php');
    }
    session_start();
    include '../util/util.php';
      $cnx=new util();
             $cn=$cnx->getConexion();
            $res2=$cn->prepare("select concat('US',right(concat('00000',right(IFNULL(max(codusu),'00000'),5)+1),5)) AS COD from usuario;");
            $res2->execute();
            foreach ($res2 as $row){  
                    $txtcod=$row[0];
                    $GLOBALS['txtcod'];
            }

    switch ($accion) {
    	case 'nuevousu':
                $codusu=$txtcod;
                $nomusu=$_REQUEST['txtnom'];
		  $apeusu=$_REQUEST['txtape'];
                  $dni=$_REQUEST['txtdni'];
		  $sexo=$_REQUEST['txtsexo'];
		  $telefono=$_REQUEST['txtdtelef'];
		 $direc=$_REQUEST['txtdirec'];
		  $mail=$_REQUEST['txtemail'];
                $pass=$_REQUEST['txtpass'];
		  $res=$cn->prepare("call buscarmail(:mail);");			
			$res->bindParam(':mail', $mail);
			$res->execute();
			foreach ($res as $row) {
				$m=$row[0];
				$GLOBALS['m'];	
			}
                        
                        
			if($m==$mail){
                        $_SESSION['msg']='Someone is already registered with this email';
		 	header('Location: ../view/login.php');
			}elseif (@$nomusu==' ') {
		 	$_SESSION['msg']='Complete the Name field';
		 	header('Location: ../view/login.php');
		 }elseif (@$apeusu==' ') {
		 	$_SESSION['msg']='Complete the Last Name field';
		 	header('Location: ../view/login.php');
		 }elseif (@$dni==' ') {
		 	$_SESSION['msg']='Complete the field DNI';
		 	header('Location: ../view/login.php');
		 }elseif (@$sexo==' ') {
		 	$_SESSION['msg']='Complete the Sex field';
		 	header('Location: ../view/login.php');
		 }elseif (@$mail==' ') {
		 	$_SESSION['msg']='Complete the email field';
		 	header('Location: ../view/login.php');
		 }elseif (@$telefono==' ') {
		 	$_SESSION['msg']='Complete the phone field';
		 	header('Location: ../view/login.php');
		 }elseif (@$pass==' ') {
		 	$_SESSION['msg']='Complete the Password field';
		 	header('Location: ../view/login.php');
		 }elseif (@$direc==' ') {
		 	$_SESSION['msg']='Complete the Confirm Password field';
		 	header('Location: ../view/login.php');
		 }elseif($m<>$mail){
		 	$res=$cn->prepare("call nuevousu(:codus, :nomus, :apeus, :dn, :sex, :telef, :direcc, :mail, :pas);");			
			$res->bindParam(':codus',$codusu);
                        $res->bindParam(':nomus',$nomusu);
                        $res->bindParam(':apeus',$apeusu);
                        $res->bindParam(':dn',$dni);
                        $res->bindParam(':sex',$sexo);
                        $res->bindParam(':telef',$telefono);
                        $res->bindParam(':direcc',$direc);
                        $res->bindParam(':mail',$mail);
                        $res->bindParam(':pas',$pass);
			$res->execute();
		 	header("Location: controlador.php?op=5&txtemail=$mail&txtpass=$pass");
		 }
    		break;
    	
    	default:
    	 
    		break;
    }
		
?>