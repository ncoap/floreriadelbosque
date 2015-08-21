<?php
session_start();
$fecha=date('d_m_Y');
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_detallepedido_$fecha.xls");
if($_SESSION['acceso']<>true){
        header('Location: index.php');
    }
if($_SESSION['rol']<>'A'){
        header('Location: index.php');
    }
  

      $codpedido=$_REQUEST['codpedido'];
     include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Floreria de Bosque</title>
        <style>
                .detpedi{
                     background: #fbfbfb;
            width: 95%;
            margin: 0 auto;
            overflow: hidden;
            font-family: Arial,Helvetica,sans-serif;
  font-size: 13px;
  line-height: 1.42857;
  color: #777777;
        }
        .titdetp{
              font: 600 18px/22px "Open Sans",sans-serif;
  color: #555454;
  text-transform: uppercase;
  padding: 0 0 17px 0;
  margin-bottom: 30px;
  border-bottom: 1px solid #d6d4d4;
  overflow: hidden;
        } 
        .detcaja{
              background: #fbfbfb;
  border: 1px solid #d6d4d4;
  padding: 14px 18px 13px;
  margin: 0 0 30px 0;
  line-height: 23px;
        }
                .table { font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 0 auto;    width: 800px; text-align: center;    border-collapse:  collapse; }

.th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #D4D4D4;
    border-top: 4px solid #C6C6C6;    border-bottom: 1px solid #fff; color: #777777; }

.td {    padding: 8px;     background: #E4E4E4;     border-bottom: 1px solid #fff;
    color: #777777;    border-top: 1px solid #777777; }

.tr:hover td { background: #DBDBDB; color: #339; }
            </style>
    </head> 
    <body>
  
        
            
            <?php
                 
          $res=$cn->prepare("call pedxcod(:codped)");
      $res->bindParam(":codped", $codpedido);
      $res->execute();
      foreach ($res as $row){ 
            ?>
              <table class="detpedi" >
                   <h1 class="titdetp">Resumen De Pedido</h1>
                   <div class="detcaja">
                       <tr><?php 
                        if($row[13]=='N'){
                           echo 'Este Pedido no ha sido pagado por el cliente'; 
                        }else{
                            echo 'Este Pedido ya ha sido Pagado por el cliente';
                        }
                       ?></tr>
                       <p>El Código del cliente es :<?php echo ''.$row[1]?></p>
                       <p>El Código de Pedido es :<?php echo ''.$row[0]?></p>
                        <p>El monto por envio es :<?php echo ' $/.'.$row[15].' o '.'S/.'.$row[7].' '?></p>
                       <p>El monto Total es :<?php echo ' $/.'.$row[4].' o '.'S/.'.$row[14].' '?>Por la compra de <?php echo $row[2].' '?> producto(s) </p>
                        <p>Le Fecha del pedido es :<?php echo ' '.$row[3]?></p>
                        <tr>Datos del Destinatario</tr>
                        <p>Nombres :<?php echo $row[5]?></p>
                        <p>Teléfono :<?php echo $row[6]?></p>
                        <p>Dirección:<?php echo $row[8]?></p>
                        <p>Referencia :<?php echo $row[9]?></p>
                        <p>Fecha de entrega :<?php echo $row[10]?></p>
                        <p>Horario de entrega :<?php echo $row[11]?></p>
                        <p>Mensaje para la tarjeta  :<?php echo $row[12]?></p>
                       
                   </div>
               </table>
            <?php
      }?>
           
      <div class="proxsub" >
       
          
          <table class="table" >
              <tr class="tr">
                  <th class="th">Codigo del Producto</th> <th class="th">Nombre</th> <th class="th">Precio Unitario</th> <th class="th">Cantidad</th> <th class="th">Sub-Total</th> 
                   <th class="th">Imagen</th> 
              </tr>
             
               <?php
              
            try 
                {
              
                   
      $res=$cn->prepare("call detaxcod(:codped)");
      $res->bindParam(":codped", $codpedido);
      $res->execute();
      foreach ($res as $row){         
           ?>
                     <tr class="tr">
                    <td class="td"><?php echo $row[0]?></td>
                    <td class="td"><?php echo $row[1]?></td>
                    <td class="td"><?php echo $row[2]?></td>
                    <td class="td"><?php echo $row[3]?></td>
                 <td class="td"><?php echo $row[3]*$row[2]?></td>
                 <td class="td"><img class="busqpro" src="<?php echo '../produc/'.$row[4]?>"></td>
              </tr>
        <?php  
                   }
                   $cnx=null;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    }
                ?> 
            
             
               <?php  ?>
          </table><?php 
         
          ?>
      </div> 
            
          
    </body>
</html>
