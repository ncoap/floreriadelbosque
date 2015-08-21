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
       <table align="center" class="tablaresul" width="800">
            <tr class="cabetabla">
                    <th>Código</th><th>Código de Venta</th><th>Nombre</th> <th>Estado</th>
                    <th>Stock</th><th>Precio</th><th>Subcategoria</th><th>Imagen</th><th colspan="2">Acción</th>
                </tr>
 <?php
            try 
                {
                  @$nom=$_REQUEST['nom'];
                  include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select* from producto p where p.nomproe like '%$nom%'");
                    $res->execute(); //asi guardo los datos de la BD 
                  if($res==null){
                      ?>
                          <h2 align="center">Sin resultados</h2>
                          <?php
                  }else{
                   foreach($res as $row){
                       
           ?>
        
                <tr>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[13]?></td>
                    <td><?php echo $row[1]?></td>
                    
                    <td><?php echo $row[6]?></td>
                    <td><?php echo $row[7]?></td>
                    <td><?php echo $row[8]?></td>
                    <td><?php echo $row[9]?></td>
                    <td><img class="busqpro" src="../produc/<?php echo $row[10]?>"></td>
                    
                    <td><a href="../controlador/controlador.php?codpro=<?php echo $row[0] ?>&op=2&ex=1">
                            <img  class="desa" src="../img/editar.png"></a></td> 
                </tr>
       
        
        <?php
                    
                   }}
                    
                   
                   
                   $cnx=null;
                }catch(PDOException $e){echo $e->getMessage();}
                ?> </table>
    </body>
</html>
