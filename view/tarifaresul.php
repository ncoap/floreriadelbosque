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
       <table align="center" class="tablaresul" width="950">
            <tr class="cabetabla">
                <th>Código</th><th>Zona</th> <th>tarifa</th><th>Estado</th><th>Acción</th>
            </tr>
 <?php
            try 
                {
                  @$nom=$_REQUEST['nom'];
         
                    include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select* from tarifas t where t.zona like '%$nom%'");
                   $res->execute(); //asi guardo los datos de la BD 
                  
                   foreach($res as $row){
                       
           ?>
        
                <tr>
                     
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo '$/.'.$row[2]?></td>
                     <td><?php echo $row[3]?></td>
                    <td><a href="../controlador/controlador.php?codtari=<?php echo $row[0] ?>&op=18">
                            <img  class="desa" src="../img/editar.png"></a></td> 
                    
                </tr>
       
        
        <?php
                   
                   }
                    
                   
                   
                   $cnx=null;
                }catch(PDOException $e){echo $e->getMessage();}
                ?> </table>
    </body>
</html>
