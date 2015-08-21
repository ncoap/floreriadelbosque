<?php
session_start();
if($_SESSION['acceso']<>true){
        header('Location: index.php');
    }
if($_SESSION['rol']<>'A'){
        header('Location: index.php');
    }
        
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title></title>
    </head>
    <body>
       <table align="center" class="tablaresul" width="980">
            <tr class="cabetabla">
                   <th>Código</th><th>Nombre</th> <th>Apellidos</th>
                    <th>DNI</th><th>Rol</th><th>Sexo</th><th>Telefono</th>
                    <th>Dirección</th><th>Correo</th><th>Password</th>
            </tr>
 <?php
            try 
                {
                  @$nom=$_REQUEST['nom'];
         
                    include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select* from usuario u where u.nomusu like '%$nom%'");
                   $res->execute(); //asi guardo los datos de la BD 
                 
                   foreach($res as $row){
                       
           ?>
        
                <tr>
                     
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php echo $row[4]?></td>
                    <td><?php echo $row[5]?></td>                  
                    <td><?php echo $row[6]?></td>
                      <td><?php echo $row[7]?></td>
                    <td><?php echo $row[8]?></td>
                    <td><?php echo $row[9]?></td>
                    
                </tr>
       
        
        <?php
                   
                   }
                   
                   
                    
                   
                   
                   $cnx=null;
                }catch(PDOException $e){echo $e->getMessage();}
                ?> </table>
    </body>
</html>
