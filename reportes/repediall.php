<?php
session_start();
$fecha=date('d_m_Y');
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_all_orders_$fecha.xls");
if($_SESSION['acceso']<>true){
        header('Location: index.php');
    }
if($_SESSION['rol']<>'A'){
        header('Location: index.php');
    }
  

@$pediall=$_SESSION['pediall'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Floreria de Bosque</title>
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
     
         
                 
                <article class="ventana3">
                <section class="form3"> 
                   
      
          <?php if(count($pediall)>0){ ?>
          <table width="1530" class="tablaresul">
              <tr class="cabetabla">
                  <th>Codigo del Pedido</th> <th>Codigo de Usuario</th> <th>Cantidad</th> <th>Fecha del Pedido</th> <th>Monto total</th>
                  <th>Datos del Destinatario</th><th>Teléfono de Entrega</th><th>Costo por Envió</th><th>Dirección de Entrega</th><th>Referencia</th><th>Fecha de Entrega</th>
                  <th>Horario de Entrega</th><th>Mensaje</th><th>Estado</th><th>Acción</th>
              </tr>
              <?php   
               
              foreach ($pediall as $row){?>
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
                     <td><?php echo $row[10]?></td>                  
                    <td><?php echo $row[11]?></td>
                      <td><?php echo $row[12]?></td>
                    <td><?php echo $row[13]?></td>
                    <td><a href="../controlador/controlador.php?codpedido=<?php echo $row[0];?>&op=10"><img class="desa" src="../img/ver.png"></a></td>
              </tr>
               <?php  }?>
          </table><?php 
          }else{
                    echo '<h2 align="center">El Usuario no Tiene ningun pedido</h2>';
               }
          ?>
         
     
            </section>
            </article>
            
    </body>
</html>
