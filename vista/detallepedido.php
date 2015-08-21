<?php
session_start();
if($_SESSION['acceso']<>true){
        header('Location: index.php');
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
                            <a href="../vista/detallepedido.php"><img  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/detallepedido.php"><img  class="idiomanoselec" src="../img/ingles.jpg"></a>
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
                    <li><a href="contacto.php" class="noselec">
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
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
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
         
            </header><br>
            <?php
                 if(isset($_SESSION['codpedido'])){
      $codpedido=$_SESSION['codpedido'];
        }
          $res=$cn->prepare("call pedxcod(:codped)");
      $res->bindParam(":codped", $codpedido);
      $res->execute();
      foreach ($res as $row){ 
          $es=$row[13];
           
            ?>
              <div class="detpedi" id="detpedi">
                   
                   <div class="detcaja">
                       <h1 class="titdetp">Resumen De Pedido</h1>
                       <strong><?php 
                        if($row[13]=='N'){
                           echo 'Este Pedido no ha sido pagado por el cliente'; 
                        }else{
                            echo 'Este Pedido ya ha sido Pagado por el cliente';
                        }
                       ?></strong>
                        <p>El Código del cliente es :<?php echo ' '.$row[1]?></p>
                       <p>El Código de Pedido es :<?php echo ' '.$row[0]?></p>
                        <p>El monto por envio es :<?php echo ' $/.'.$row[15].' o '.'S/.'.$row[7].' '?></p>
                       <p>El monto Total es :<?php echo ' $/.'.$row[4].' o '.'S/.'.$row[14].' '?>Por la compra de <?php echo $row[2].' '?> producto(s) </p>
                        <p>Le Fecha del pedido es :<?php echo ' '.$row[3]?></p>
                        <strong>Datos del Destinatario</strong>
                        <p>Nombres :<?php echo $row[5]?></p>
                        <p>Teléfono :<?php echo $row[6]?></p>
                        <p>Dirección:<?php echo $row[8]?></p>
                        <p>Referencia :<?php echo $row[9]?></p>
                        <p>Fecha de entrega :<?php echo $row[10]?></p>
                        <p>Horario de entrega :<?php echo $row[11]?></p>
                        <p>Mensaje para la tarjeta  :<?php echo $row[12]?></p>
                       
                   </div>
               </div>
            <?php if($row[13]=='N'){?>
            <div style="
    width: 50px;
    margin: 0 auto;
"><a href="../controlador/valida.php?codpedido=<?php echo $row[0];?>&accion=aprueped">
                     <img  class="desa" src="../img/siapru.png"></a></div><?php }?>
            <?php
      }?>
            <style>
                .table { font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 0 auto;    width: 800px; text-align: center;    border-collapse:  collapse; }

.th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #D4D4D4;
    border-top: 4px solid #C6C6C6;    border-bottom: 1px solid #fff; color: #777777; }

.td {    padding: 8px;     background: #E4E4E4;     border-bottom: 1px solid #fff;
    color: #777777;    border-top: 1px solid #777777; }

.tr:hover td { background: #DBDBDB; color: #339; }
            </style>
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
                    <td class="td"><?php echo $row[5]?></td>
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
            
             
               
          </table>
       
      </div>
            
          <?php 
         if($_SESSION['rol']=='A'){
        
          
          ?>
              
            <h1 align="center"><form alig="center" id="form1" name="form1" method="post" action="../reportes/redetallepedido.php">
              <input type="hidden" name="codpedido" value="<?php echo $codpedido?>">
           <input type="submit" value="Exportar a Excel">
        </form></h1><?php   }?>
            
             
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
