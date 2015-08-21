<?php
session_start();
$fecha=date('d_m_Y');
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_allproduct_$fecha.xls");

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
        <title></title>
          <style>
            .tablaresul tr td{
            border: 1px solid;
            border-color: #363535;
            border-collapse: collapse;
              padding:10px;
        }
        
        .tablaresul{
            border: 1px solid;
            border-color: #363535;
            border-collapse: collapse;
            text-align: center;
        }
        .cabetabla{
            background-color: #363535;
            color:white;
              padding:10px;
            height: 50px;
        }
        </style>
    </head>
    <body>
       <table align="center" class="tablaresul" width="1000">
            <tr >
                   <th class="cabetabla">Código</th><th class="cabetabla">Código de Venta</th><th class="cabetabla">Nombre en Español</th> <th class="cabetabla">Descripción en Español</th>
                    <th class="cabetabla">Nombre en Ingles</th><th class="cabetabla">Descripción en Ingles</th><th class="cabetabla">Fecha de Ingreso</th>
                    <th class="cabetabla">Estado</th><th class="cabetabla">Stock</th><th class="cabetabla">Precio</th><th class="cabetabla">Nobre Sub-Categoria</th> 
            </tr>
 <?php
            try 
                {
                   
                    include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
             $res=$cn->prepare("call allproduct");			
			$res->execute(); //asi guardo los datos de la BD 
                  
                   foreach($res as $row){
                       
           ?>
        
                <tr>
                    
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[10]?></td>
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
