<?php
session_start();
    if(isset($_SESSION['codpedido'])){
$codpedido=$_SESSION['codpedido'];
        }else{
            header("Location: index.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Floreria de Bosque</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" href="../img/icon.ico">
    </head> 
    <body>
      <!-- <div class="carrito">
            <p class="micar">Mi Carrito</p>
            <img src="../img/carrito.png">
            <p class="total">$/. 0.00 </p>
        </div>-->
        <div class="cuerpo">
            <header class="top">
                <a href="../controlador/controlador.php?op=1"><img class="logo" src="../img/logo.png"></a>
                 <div class="user">
                    <ul>
                       
                       <li>
                            <?php
                           
                            if(isset($_SESSION['acceso'])){
                            @$nomusu=$_SESSION['nomusu'];?>
                            <a href="micuenta.php"><?php echo $nomusu;?></a>
                            <a class="login" href="../controlador/controlador.php?op=6">( Salir )</a>
                            <?php }else{?> <a class="login" href="login.php">Bienvenido,(  Entrar  )</a><?php }?>
                        </li>
                       
                    </ul>
                </div>
                <div class="idiomas">
                    <ul>
                        <li class="carr">
                            <img src="../img/carrito.png"> <a href="carrito.php"> Carrito:</a><?php
                            if(isset($_SESSION['ca'])){
                            echo '<span>'.@$_SESSION['ca'].'</span>'; }else{ echo 'Vacio';} ?>
                        </li>
                        <li>
                            <a href="#"><form action="../controlador/controlador.php" method="post" name="form1">
                                    <input class="caja" type="text" name="letra">
                                    <input type="hidden" name="op" value="19">
                                <input class="bntenvi" type="submit" name="btnenvi"></form></a>
                        </li>
                        <li>
                            <a href="../vista/confirmacompra.php"><img  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/confirmacompra.php"><img  class="idiomanoselec" src="../img/ingles.jpg"></a>
                        </li>
                    </ul>
                </div>
                <ul class="menudos">
                    <li><a href="../controlador/controlador.php?op=1" class="noselec">
                        INICIO</a>
                    </li>
                    <li><a href="quienessomos.php" class="noselec">
                        QUIENES SOMOS</a>
                    </li>
                    <li><a href="../controlador/controlador.php?op=4" class="noselec">
                        ESPECIALES</a>
                    </li>
                    <li><a href="contacto.php" class="selec">
                        CONTACTO</a>
                    </li>
                </ul>
              
       <div id="header">
    <ul class="nav">
            <li><a href="">Cajas y Ramos</a> <ul><?php
            include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c001' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul>
 </li>
             <li><a href="">Arreglos</a> <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c002' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul></li>
            <li><a href="">Bebés y niños</a>
                    <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c003' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href=".. /controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul>
            </li>
            <li><a href="">Especiales</a>
                    <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c004' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul>
            </li>
            <li><a href="">Condolencias</a>
            <ul> <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c005' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>  
                    </ul></li>
            <li><a href="">Institucional</a><ul>
                           <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c006' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>              
                    </ul></li>
            <li><a href="">Ofertas de  Temporada</a><ul>
                            <li><a href="">Catálogo</a></li>
                            <li><a href="">Clientes Premium</a></li>  
                            <li><a href="">Regulares</a></li>                   
                    </ul></li>
            <li><a href="">Regalos y  Complementos</a><ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c008' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>                    
                    </ul></li>
    </ul>
		</div>
         
            </header>
            
           <div class="proxsub">
                <?php
    
        
         $res=$cn->prepare("call pedxcod(:codped)");
      $res->bindParam(":codped", $codpedido);
      $res->execute();
      foreach ($res as $row){ 
          $costenvio=$row[7];
      ?>
               <div class="detpedi">
                   
                   <div class="detcaja">
                       <h1 class="titdetp">Resumen De Pedido</h1>
                       <strong>Su pedido en Florería  del Bosque está completo.</strong>
                       <p>El Código de Pedido es :<?php echo ' '.$row[0]?></p>
                        <p>El monto por envío es :<?php echo ' $/.'.$row[7].' o '.'S/.'.$row[15].' '?></p>
                       <p>El monto Total es :<?php echo ' $/.'.$row[4].' o '.'S/.'.$row[14].' '?>Por la compra de <?php echo $row[2].' '?> producto(s) </p>
                        <p>La Fecha del pedido es :<?php echo ' '.$row[3]?></p>
                        <strong>Datos del Destinatario</strong>
                        <p>Nombres :<?php echo $row[5]?></p>
                        <p>Teléfono :<?php echo $row[6]?></p>
                        <p>Dirección:<?php echo $row[8]?></p>
                        <p>Referencia :<?php echo $row[9]?></p>
                        <p>Fecha de entrega :<?php echo $row[10]?></p>
                        <p>Horario de entrega :<?php echo $row[11]?></p>
                        <p>Mensaje para la tarjeta  :<?php echo $row[12]?></p>
                       <p>Para cualquier duda o para más información, puedes llamarnos al  982 938 465
                       o puedes escribirnos al
                        correo: ventas@floreriadelbosque.com </p>
                       <p>Su pedido será enviado próximamente, en cuanto recibamos su pago.</p>
                       <p>Al finalizar el pago, se le enviara un correo con el detalle 
                        de su compra, también podrá visualizarlo dentro de su perfil, y en la opción Mis Pedidos.</p>
                   </div>
               </div>
               <form action="pagotransferencia.php" method="post">
                   <input type="hidden" name="codped" value="<?php echo $codpedido?>">
                   <input type="image" class="icocar" src="../img/transferencia.png"></a></form>
        <form action="https://www.paypal.com/cgi-bin/websrc" method="post">
 <?php }
            try 
                {
                  $i=1;
                   
      $res=$cn->prepare("call detaxcod(:codped)");
      $res->bindParam(":codped", $codpedido);
      $res->execute();
      foreach ($res as $row){         
           ?>
                     <input type="hidden" name="item_name_<?php echo $i++; ;?>" value="<?php echo $row[1];?>">
	   <input type="hidden" name="amount_<?php echo $i-1;?>" value="<?php echo $row[2];?>">
	   <input type="hidden" name="quantity_<?php  echo $i-1;?>" value="<?php echo $row[3];?>">
        <?php  
                   }
                   $cnx=null;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    }
                ?> 
        <input type="hidden" name="cmd" value="_cart">
	   <input type="hidden" name="upload" value="1">
	   <input type="hidden" name="business" value="pagos@floreriadelbosque.com">
	   <input type="hidden" name="currency_code" value="USD">
           <input type="hidden" name="shipping_1" value="<?php echo $costenvio;?>">
 <input class="icocar" type="image" src="../img/pagar.png"
                   name="submit">
        </form>
              

            </div>
            <div class="redsoc">
                <ul class="redes">
                    <li> <p class="sigue">Síguenos en:</p>  </li>
                    <li><a target="_blanck" href="https://www.facebook.com/floreriadelbosquesrl?ref=hl"><img class="face" src="../img/facebook1.png"></a></li>
                     <li><a target="_blanck"  href="http://instagram.com/"><img class="ins" src="../img/instagram.png"></a></li>
                      <li><a  target="_blanck" href="http://youtube.com/"><img class="yout" src="../img/youtube.png"></a></li>
                       <li><a target="_blanck"  href="http://floreriadelbosque.blogspot.com/"><img class="blog" src="../img/blog.png"></a></li>
                </ul>
                  
               
            </div>
           <div class="datos">
                <table class="ddatos">
                    <tr> <td>Central Telefónica </td>
                        <td class="spa">Certificados:</td></tr>
                    <tr> <td>982 938 465</td></tr>
                    <tr> <td>Informes: ventas@floreriadelbosque.com</td>
                        <td class="spa"><img class="paypal" src="../img/paypal.svg"><img src=""></td></tr>
                     
                </table>
            </div>
            <div class="derechos">
                <p>Desarrollado Por <a href="http://www.innovatechperusac.com/">Innovatech Perú</a>™.  Copyright © 2015, Todos Los Derechos Reservados
</p>
            </div>
        </div>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
 <script type="text/javascript" src="http://jappix.com/php/get.php?l=en&t=js&g=mini.xml"></script>

<script type="text/javascript">
       jQuery(document).ready(function() {
          MINI_CHATS = ['floreriadelbosque@jappix.com'];
          MINI_ANIMATE = true;
          launchMini(false, true, "anonymous.jappix.com");
       });
</script>
    </body>
</html>
