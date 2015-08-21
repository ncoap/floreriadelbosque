<?php

session_start();
 include '../util/util.php';
        $cnx=new util();
             $cn=$cnx->getConexion();
 $res0=$cn->prepare("select concat('P',right(concat('00000',right(IFNULL(max(codpedido),'00000'),5)+1),5)) AS COD from pedido;");//selec concat('P',LPAD((1max(numPed)+1),6),'0')) as cod from productos -- 
        $res0->execute();
        foreach($res0 as $c){
            $n=$c[0];
        } 
      
        $num=$n;
      $cli=$_SESSION['codusu'];
      $can=$_REQUEST["txtcan"];
      $total=$_REQUEST["txttotal"];
       $prec=$_REQUEST["txtpre"];
       $nomdes=$_REQUEST['nomdest'];
       $fonoentre=$_REQUEST['fonoentre'];
       $tari=$_REQUEST['distri2'];
       $direc=$_REQUEST['direc'];
       $refere=$_REQUEST['refere'];
       $fechaentre=$_REQUEST['fechaentre'];
       $mensaje=$_REQUEST['mensaje'];
       $hora=$_REQUEST['hora'];
       
       $pedido=$_SESSION['pedido'];
          
        $res=$cn->prepare("select * from tipocambio;");
           $res->execute();
           foreach ($res as $row){
               $tip=$row[0];
               $GLOBALS['tip'];
           }
          $totalsoles=$tip*$total;
           $taresoles=$tip*$tari;
      //insertando los datos a la cabecera de pedido(tabla pedidos)
        
       $res=$cn->prepare("insert into pedido (codpedido,codusu,cantot,montoTotal,datosdestin,telefentre,tarifa,direcentre,referencia,fechaentreg,horarioentre,mensaje,montoTotalsoles,tarifasoles) 
                                values (:n,:c,:can,:t,:da,:tele,:tar,:dire,:refe,:fechen,:hor,:men,:totsoles,:tarsoles)");
       $res->bindParam(":n",$num);
       $res->bindParam(":c",$cli);
       $res->bindParam(":can",$can);
       $res->bindParam(":t",$total);
       $res->bindParam(":da",$nomdes);
       $res->bindParam(":tele",$fonoentre);
       $res->bindParam(":tar",$tari);
       $res->bindParam(":dire",$direc);
       $res->bindParam(":refe",$refere);
       $res->bindParam(":fechen",$fechaentre);
       $res->bindParam(":hor",$hora);
       $res->bindParam(":men",$mensaje);
       $res->bindParam(":totsoles",$totalsoles);
       $res->bindParam(":tarsoles",$taresoles);
      $res->execute();
      
      //insertando los datos al detalle pedido(tabla detallaPedido)
     
      foreach($_SESSION['pedido'] as $cod=>$x){
          $res=$cn->prepare("select * from producto where codpro=:c");
           $res->bindParam(":c", $cod);
           $res->execute();
           foreach ($res as $row){
               $pre=$row[8];
           }
          $res2=$cn->prepare("insert into detpedido (codpedido,codpro,precuni,cantidad) values (:num,:cod,:pr,:cant)");
          $res2->bindParam(":num", $num);
          $res2->bindParam(":cod", $cod);
          $res2->bindParam(":pr", $pre);
          $res2->bindParam(":cant", $x);
          $res2->execute();
          
        
      }
      
      
         
      
      unset($_SESSION['pedido']);
      unset($_SESSION['ca']);
      $_SESSION['total']=$total;
     $_SESSION['codpedido']=$num; 
     $_SESSION['costenvio']=$tari;
        header("Location: ../vista/confirmacompra.php");
?>
