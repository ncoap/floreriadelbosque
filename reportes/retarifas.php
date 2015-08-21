<?php
session_start();
$fecha=date('d_m_Y');
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_all_tarifas_$fecha.xls");
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
          border: 0px solid;
        
          
        }
        .cabetabla th{
            padding:10px;
            height: 50px;
               background-color: #363535;
            color:white;
        }
        </style>
    </head>
    <body>
       <table align="center" class="tablaresul" width="1000">
            <tr class="cabetabla">
                   <th>Código</th><th>Zona</th> <th>tarifa</th>
            </tr>
 <?php
            try 
                {
                  
         
                    include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select* from tarifas ");
                   $res->execute(); //asi guardo los datos de la BD 
                  
                   foreach($res as $row){
                       
           ?>
        
                <tr>
                     
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo '$/.'.$row[2]?></td>
                    
                    
                </tr>
       
        
        <?php
                   
                   }
                    
                   
                   
                   $cnx=null;
                }catch(PDOException $e){echo $e->getMessage();}
                ?> </table>
    </body>
</html>
